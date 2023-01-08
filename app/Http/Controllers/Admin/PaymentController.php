<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Payment;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Mail\NotificationEmail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class PaymentController extends Controller
{
    public function index(){
        $payment = Payment::with('reservations')->get();
        return view('pages.admin.pembayaran.index', compact('payment'));
    }
    public function edit($id)
    {
        $payment = Payment::findOrfail($id);
        return view('pages.admin.pembayaran.edit', compact('payment'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'payment_status' => 'required'
        ]);
        $payment = Payment::findOrfail($id);
        
        $reservasi = Reservation::with('rooms', 'users')->where('id', '=', $payment->reservation_id)->first();
        // dd($reservasi);
            Mail::to($reservasi->users->email)->send(new NotificationEmail($reservasi));
            return 'sukses';
        
    }
}
