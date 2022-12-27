<?php

namespace App\Http\Controllers\Admin;
use App\Models\Room;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Mail\NotificationEmail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class ReservationController extends Controller
{
    public function index(){
        $reservasi = Reservation::with('rooms', 'users')->get();
        // dd($reservasi);
        return view('pages.admin.reservasi.index', compact('reservasi'));
    }
    public function edit($id)
    {
        $reservasi = Reservation::findOrfail($id);
        return view('pages.admin.reservasi.edit', compact('reservasi'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'reservation_status' => 'required'
        ]);
        $reservasi = Reservation::findOrfail($id);
        Reservation::where('id', $id)->update([
            'reservation_status' => $request->reservation_status
        ]);
        if($request->reservation_status == 'Diterima')
        Mail::to('l200180156@student.ums.ac.id')->send(new NotificationEmail($reservasi));
        return 'sukses';
    }
}
