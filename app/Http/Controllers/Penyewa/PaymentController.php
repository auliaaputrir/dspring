<?php

namespace App\Http\Controllers\Penyewa;

use App\Models\Payment;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
{
    public function index($id){
        $reservasi = Reservation::findOrfail($id);
        return view('pages.user.pembayaran.index', compact('reservasi'));
    }
    public function store(Request $request){

        dd($request->provement);
        $request->validate([
            'id_reservation' => 'required',
            'total' => 'required',
            'provement' => 'required'

        ]);
    }
}
