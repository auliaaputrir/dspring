<?php

namespace App\Http\Controllers\Penyewa;

use Carbon\Carbon;
use App\Models\Room;
use App\Models\User;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Mail\NotificationEmail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ReservationController extends Controller
{
  public function index(){
    $reservasi = Reservation::with('rooms', 'users')
                            ->where('user_id', Auth::user()->id)
                            ->orderByRaw("FIELD(reservation_status, \"Menunggu\", \"Diterima\", \"Ditolak\")")
                            ->get();
    return view('pages.user.reservasi.index', compact('reservasi'));
  }
  
  public function create(){
    return view ('pages.user.reservasi.create');
  }

  public function store(Request $request){
    $min= Carbon::now()->format('Y-m-d');
    
    $request->validate([
      'room_number' => 'required|max:255',
      'period' => 'required|max:255',
      'stay_date' => 'required|after:'.$min
    ]);
    // dd(Auth::user('name')->name);
    $data = Reservation::create([
      'name' => Auth::user('name')->name,
      'room_id' => $request->room_number,
      'user_id' => Auth::id(),
      'period' => $request->period,
      'stay_date' => $request->stay_date,
      'reservation_status' => 'Menunggu'
    ]);

    $admin = User::select('email')->where('role', '=', 'admin')->first();
    
    Room::where('id', $request->room_number)
    ->update([
      'room_status' => 'Terpesan'
    ]);
    
    $data['message'] = 'Pemesanan Baru Telah Dilakukan.';
    $data['message2'] = 'Segera Lakukan Konfirmasi Pada Sistem Pemesanan.';
    
    Mail::to($admin)->send(new NotificationEmail($data));
    return redirect('/penyewa/reservasi');
    
  }
}
