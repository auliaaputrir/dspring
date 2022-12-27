<?php

namespace App\Mail;

// use App\Models\Reservation;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotificationEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($res)
    {
        $this->reservasi = $res;
        // $This->
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
        ->from('coba.aulia@gmail.com')
        ->subject('Pesanan Baru Telah Dibuaat!')
        ->view('mail\email')
        ->with([
            'name' => $this->reservasi->users->name,
            'room_number' => $this->reservasi->rooms->room_number,
            'stay_date' => $this->reservasi->stay_date,
            'period' => $this->reservasi->period

        ]);
    }
}
