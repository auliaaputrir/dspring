<?php

namespace App\Http\Controllers\Admin;

use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        Reservation::where('id', $id)->update([
            'reservation_status' => $request->reservation_status
        ]);
        return redirect()->route('reservasi');
    }
}
