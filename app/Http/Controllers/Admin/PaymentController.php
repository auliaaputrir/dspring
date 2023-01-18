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
        $payment = Payment::with('reservations')
                            ->where('image','!=', null)
                            ->orderByRaw("FIELD(payment_status, \"Menunggu\", \"Ditolak\", \"Terbayar\", \"Gagal\")")
                            ->get();
        return view('pages.admin.pembayaran.index', compact('payment'));
    }

    public function edit($id)
    {
        $payment = Payment::findOrfail($id);
        return view('pages.admin.pembayaran.edit', compact('payment'));
    }

    public function update(Request $request,Payment $payment)
    {
        $reservasi = $payment->reservations;

        $request->validate([
            'payment_status' => 'required'
        ]);

        Payment::where('id', $payment->id)->update([
            'payment_status' => $request->payment_status
        ]);
        if($request->payment_status == 'Terbayar') 
        {
            $reservasi ['message'] = "Pembayaran Telah Dikonfirmasi"; 
            $reservasi ['message2'] = 'Terimakasih telah bergabung bersama kami.';
        } else {
            $reservasi['message'] = 'Pembayaran Anda Ditolak.';
            $reservasi['message2'] = 'Silakan coba lagi.';
        }
        
      
        Mail::to($reservasi->users->email)->send(new NotificationEmail($reservasi));
        return redirect(route('pembayaran-edit', $payment->id));
    }
}
