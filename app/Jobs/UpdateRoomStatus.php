<?php

namespace App\Jobs;

use App\Models\Room;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class UpdateRoomStatus implements ShouldQueue
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
        Room::where('room_status', 'Terpesan')
            ->whereHas('reservations', function(Builder $query){
                $query->whereRaw('case 
                                    when (period = "Tahunan")
                                    then stay_date <= date_sub(date(now()), INTERVAL 1 Year)
                                    when (period = "Bulanan")
                                    then stay_date <= date_sub(date(now()), INTERVAL 1 Month)
                                end')
                        ->where('reservation_status', 'Diterima');
            })
            ->update(['room_status' => 'Ada']);
    }
}
