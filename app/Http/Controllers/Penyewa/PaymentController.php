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
    public function store(Request $request, Reservation $id){
        #apabila di route menggunakan parameter diusahakan function jg menggunakan paramater
        $request->validate([
            'total' => 'required|numeric',
            'image' => 'required|mimes:png,jpg,jpeg|image'
        ]);
        $image = $request->file('image');
        $name = time().'.'.$image->getClientOriginalExtension(); #generate nama file dgn time() agar tidak terjadi kesamaan penamaan yg mengakibatkan replacement file
        
        Payment::create([
            'reservation_id' => $id->id,
            'total'          => $request->total,
            'image'      => $name

        ]);
        $image->move('upload', $name);
        return 'Hell Yeah!a';
    }
}
