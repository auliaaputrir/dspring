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
    public function index($id)
    {
        $reservasi = Reservation::findOrfail($id);
        return view('pages.user.pembayaran.index', compact('reservasi'));
    }
    public function store(Request $request, Reservation $id)
    {
        $request->validate([
            'image' => 'required|mimes:png,jpg,jpeg|image',
        ]);
        $data = $id;
        $image = $request->file('image');
        if(!$id->payments->image){
            $name = time() . '.' . $image->getClientOriginalExtension();
        }else{
            $name = $id->payments->image;
        }
        Payment::where('reservation_id', $id->id)
                ->update([
                    'image' => $name,
                    'payment_status' => 'Menunggu'
                ]);
        $data['message'] = 'Pembayaran reservasi telah dilakukan.';
        $image->move('upload', $name);
        Mail::to('alputrir@gmail.com')->send(new NotificationEmail($data));
        return redirect(route('pembayaran', $id->id));
    }
}
