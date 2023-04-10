<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Room;
use App\Models\Payment;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Mail\NotificationEmail;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ReservationController extends Controller
{
    public function index()
    {
        $reservasi = Reservation::with('rooms', 'users')
            ->where('reservation_status', '!=', 'Menunggu')
            ->get();
        return view('pages.admin.reservasi.index', compact('reservasi'));
    }
    public function edit($id)
    {
        $reservasi = Reservation::findOrfail($id);
        return view('pages.admin.reservasi.edit', compact('reservasi'));
    }
    public function create(Request $request)
    {
        return view('pages.admin.reservasi.create');
    }
    public function store(Request $request)
    {
        $min = Carbon::now()->format('Y-m-d');

        $request->validate([
            'name' => 'required|max:255',
            'room_number' => 'required|max:255',
            'period' => 'required|max:255',
            'stay_date' => 'required|after:' . $min,
        ]);

        $reservasi = Reservation::create([
            'name' => $request->name,
            'room_id' => $request->room_number,
            'user_id' => Auth::id(),
            'period' => $request->period,
            'stay_date' => $request->stay_date,
            'reservation_status' => 'Diterima',
        ]);

        if ($reservasi->period == 'Bulanan') {
            $total = $reservasi->rooms->price;
        } else {
            $total = ($reservasi->rooms->price * 12 * 93.46) / 100;
        }
        $data = [
            'reservation_id' => $reservasi->id,
            'total' => $total,
            'payment_status' => 'Terbayar',
            'image' => 'lunas.png',
        ];
        Payment::create($data);
        Room::where('id', $request->room_number)->update([
            'room_status' => 'Terpesan',
        ]);
        return redirect()->route('reservasi');
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'reservation_status' => 'required',
        ]);

        $reservasi = Reservation::findOrfail($id);
        Reservation::where('id', $id)->update([
            'reservation_status' => $request->reservation_status,
        ]);

        if ($request->reservation_status == 'Diterima') {
            $reservasi['message'] = 'Reservasi Anda Diterima.';
            $reservasi['message2'] = 'Silakan Melanjutkan Pembayaran Untuk Menyelesaikan Reservasi Anda.';
            Room::where('id', $id)->update([
                'room_status' => 'Terpesan',
            ]);
            if ($reservasi->period == 'Bulanan') {
                $total = $reservasi->rooms->price;
            } else {
                $total = ($reservasi->rooms->price * 12 * 93.46) / 100;
            }
            $data = [
                'reservation_id' => $id,
                'total' => $total,
                'payment_status' => 'Menunggu'
            ];
            $r = Reservation::where('id', $id)->first();
            $tanggal = date('l, d F Y H:i', strtotime('+3 days', strtotime($r->created_at)));
            $reservasi['total'] = $total;
            $reservasi['no_rek'] = 'Pembayaran melalui rekening BRI a/n Aulia Putri 2097-0100-7454-506 sebelum ' . $tanggal;
            Payment::create($data);
        } else {
            $reservasi['message'] = 'Reservasi Anda Ditolak.';
            $reservasi['message2'] = 'Silakan coba lagi nanti.';
        }

        Mail::to($reservasi->users->email)->send(new NotificationEmail($reservasi));
        return redirect('/admin/reservasi');
    }

    public function show($id)
    {
        $r = Reservation::findOrfail($id);
        return view('pages.admin.reservasi.detail', compact('r'));
    }
    public function getfloor(Request $request)
    {
        $floor_number = $request->getfloor;
        $rooms = Room::where([['floor_number', $floor_number], ['room_status', 'Tersedia']])->get();

        return json_encode($rooms);
    }
}
