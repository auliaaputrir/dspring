<?php

namespace App\Console\Commands;

use App\Models\Room;
use App\Models\Reservation;
use Illuminate\Support\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class RoomStatusUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rooms:statusUpdate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Room status updated';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $currentDate = Carbon::now()->format('Y-m-d');
        $reservations = DB::table('rooms')
                        ->join('reservations', 'rooms.id', '=', 'reservations.room_id', 'reservation.reservation_status')
                        ->select('rooms.room_number', 'reservations.stay_date', 'reservations.period')
                        ->where('rooms.room_status', '=', 'Tidak Ada')->get();
        foreach($reservations as $res)
        {
            // dd($res->period);
            $stay_date = Carbon::parse($res->stay_date);
            if($res->period == "Bulanan" && $res->reservation_status == "Diterima" ){
                $month = $stay_date->diffInMonths($currentDate);
                if($month > 0){
                    Room::where('room_number', $res->room_number)->update(['room_status' => 'Ada']);
                }
                // Log::info($month);
            }
            if($res->period == "Tahunan" && $res->reservation_status == "Diterima" ){
                $year = $stay_date->diffInYears($currentDate);
                if($year > 0){
                    Room::where('room_number', $res->room_number)->update(['room_status' => 'Ada']);
                }
                // Log::info($month);
            }
        }
    }
}
