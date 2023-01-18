<?php

namespace App\Http\Controllers\Admin;

use App\Models\Room;
use App\Models\Payment;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $rooms = Room::where('room_status', 'Ada')->get()->count();
        $reservations = DB::table('rooms')
                        ->join('reservations', 'rooms.id', '=', 'reservations.room_id')
                        ->select('rooms.room_number', 'reservations.stay_date', 'reservations.period')
                        ->where('rooms.room_status', '=', 'Terpesan')->get()->count();
        $reservations_not_confirmed = Reservation::where('reservation_status', 'Menunggu')->get()->count();
        $payment_not_confirmed = Payment::where('payment_status', 'Menunggu')->where('image', '!=', null)->get()->count();
        $reservasi = Reservation::with('rooms', 'users')->where('reservation_status', '=', 'Menunggu')->get();
        return view('pages.admin.dashboard', compact('rooms', 'reservations', 'reservations_not_confirmed', 'payment_not_confirmed', 'reservasi'));
    }
}
