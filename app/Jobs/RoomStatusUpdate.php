<?php

namespace App\Jobs;

use Carbon\Carbon;
use App\Models\Room;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class RoomStatusUpdate implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
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
