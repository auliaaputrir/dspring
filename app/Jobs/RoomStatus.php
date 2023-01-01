<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Room;

class RoomStatus implements ShouldQueue
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
        Room::where('room_status', 'Tidak Ada')
            ->whereHas('reservations', function(Builder $query){
                $query->whereRaw('case 
                                    when (period = "tahunan")
                                    then stay_date <= date_sub(date(now()), INTERVAL 1 Year)
                                    when (period = "bulanan")
                                    then stay_date <= date_sub(date(now()), INTERVAL 1 Month)
                                end')
                        ->where('reservation_status', 'diterima');
            })
            ->update(['room_status' => 'Ada']);
    }
}