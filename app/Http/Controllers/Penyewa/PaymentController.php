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
        if ($reservasi->period == 'Bulanan') {
            $total = $reservasi->rooms->price;
        }
        else{
            $total = $reservasi->rooms->price*12*93.46/100;
        }
        $ada = Payment::where('reservation_id', $reservasi->id)->first();
        $hitung = $ada->count();
        return view('pages.user.pembayaran.index', compact('reservasi', 'total', 'ada', 'hitung'));
    }
    public function store(Request $request, Reservation $id)
    {
        $request->validate([
            'total' => 'required|numeric',
            'image' => 'required|mimes:png,jpg,jpeg|image',
        ]);
        $data = $id;
        $data['message1'] = 'Pembayaran reservasi telah dilakukan.';
        $data['message2'] = 'Lakukan pengecekkan dan segera konfirmasi.';
        $data['total'] = $request->total;
        $image = $request->file('image');
        $name = time() . '.' . $image->getClientOriginalExtension();
        Payment::create([
            'reservation_id' => $id->id,
            'total' => $request->total,
            'image' => $name,
        ]);
        $image->move('upload', $name);
        // $data = Reservation::with('payment')->get();
        $admin = User::select('email')
            ->where('role', '=', 'admin')
            ->first();
        Mail::to($admin)->send(new NotificationEmail($data));
        return 'sukses';
    }
}
