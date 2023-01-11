<?php

namespace App\Http\Controllers\Admin;
use App\Models\Room;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Mail\NotificationEmail;
use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Support\Facades\Mail;

class ReservationController extends Controller
{
    public function index(){
        $reservasi = Reservation::with('rooms', 'users')->where('reservation_status', '!=', 'Menunggu')->get();
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

        if($request->reservation_status == 'Diterima'){
            $reservasi['message'] = 'Reservasi Anda Diterima.';
            if ($reservasi->period == 'Bulanan') {
                $total = $reservasi->rooms->price;
            }
            else{
                $total = $reservasi->rooms->price*12*93.46/100;
            }
            $data = [
                'reservation_id' => $id,
                'total'        => $total
            ];
            Payment::create($data);
        }else{
            $reservasi['message'] = 'Reservasi Anda Ditolak';
        }

        Mail::to($reservasi->users->email)->send(new NotificationEmail($reservasi));
        return redirect('/admin/reservasi');
    }

    public function show($id)
    {
        $r = Reservation::findOrfail($id);
        return view('pages.admin.reservasi.detail', compact('r'));
    }
}
