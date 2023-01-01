<?php

namespace App\Http\Controllers\Penyewa;

use App\Models\User;
use App\Models\Payment;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Mail\NotificationEmail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class PaymentController extends Controller
{
    public function index($id){
        $reservasi = Reservation::findOrfail($id);
        return view('pages.user.pembayaran.index', compact('reservasi'));
    }
    public function store(Request $request, Reservation $id){
        $request->validate([
            'total' => 'required|numeric',
            'image' => 'required|mimes:png,jpg,jpeg|image'
        ]);
        $data = Reservation::with('payment')->get();
        dd($data);
        $image = $request->file('image');
        $name = time().'.'.$image->getClientOriginalExtension();
        
        Payment::create([
            'reservation_id' => $id->id,
            'total'          => $request->total,
            'image'      => $name

        ]);
        $image->move('upload', $name);
        // $data = Reservation::with('payment')->get();
        $admin = User::select('email')->where('role', '=', 'admin')->first();
        Mail::to($admin)->send(new NotificationEmail($data));
        return 'sukses';
    }
}