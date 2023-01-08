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
use Illuminate\Support\Facades\Route;

class ReservationController extends Controller
{
  public function index(){
    $reservasi = Reservation::with('rooms', 'users')->get();
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
      
        $data = Reservation::create([
          'room_id' => $request->room_number,
          'user_id' => Auth::id(),
          'period' => $request->period,
          'stay_date' => $request->stay_date,
          'reservation_status' => 'Menunggu'
        ]);
        $admin = User::select('email')->where('role', '=', 'admin')->first();
        Room::where('id', $request->room_number)
        ->update([
          'room_status' => 'Tidak Ada'
        ]);
        
        Mail::to($admin)->send(new NotificationEmail($data));
        return 'sukses';
      
   }
}
