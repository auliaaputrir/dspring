<?php

namespace App\Http\Controllers\Penyewa;

use App\Models\Room;
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
    // dd($reservasi);
    return view('pages.user.reservasi.index', compact('reservasi'));
}
   public function create(){
     return view ('pages.user.reservasi.create');
   }
   public function store(Request $request){
      $request->validate([
        'room_number' => 'required',
        'period' => 'required',
        'stay_date' => 'required'

      ]);
      
        $data = Reservation::create([
          'room_id' => $request->room_number,
          'user_id' => Auth::id(),
          'period' => $request->period,
          'stay_date' => $request->stay_date,
          'reservation_status' => 'Menunggu'
        ]);
  
        Room::where('id', $request->room_number)
        ->update([
          'room_status' => 'Tidak Ada'
        ]);
        
        Mail::to('auliaputrirachmadni@gmail.com')->send(new NotificationEmail($data));
        return 'sukses';
      
   }
}
