<?php

namespace App\Jobs;

use App\Models\Payment;
use App\Models\Room;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class UpdatePaymentStatus implements ShouldQueue
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
        $data = Payment::where('payment_status', '!=', 'Terbayar')
                ->whereHas('reservations', function(Builder $query){
                    $query->whereRaw('stay_date < date_sub(date(now()), INTERVAL 3 Day)')
                            ->where('reservation_status', 'Diterima');
                })
                ->update(['payment_status' => 'Gagal']);
        Room::where('id', $data->room_id)
            ->update([
                'room_status' => 'Tidak_ada'
            ]);
    }
}