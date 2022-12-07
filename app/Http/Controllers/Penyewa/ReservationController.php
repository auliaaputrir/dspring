<?php

namespace App\Http\Controllers\Penyewa;

use App\Models\Room;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

class ReservationController extends Controller
{
   public function create(){
     return view ('pages.user.reservasi.create');
   }
   public function store(Request $request){
      $request->validate([
        'room_number' => 'required',
        'period' => 'required',
        'stay_date' => 'required'

      ]);
      if (Reservation::where('user_id', Auth::id())->first() != null){
        return 'Kamu bikin reservasi baru-baru ini. selesaiin dulu atau coba lagi nanti!';
      }
      else{
        Reservation::create([
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
        // \Illuminate\Support\Facades\Mail::send(new \App\Mail\NotificationEmail());
        return 'sukses';
      }
      
   }
}
