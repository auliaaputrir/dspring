<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ConfirmationEmail extends Mailable
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
        ->to('l200180156@student.ums.ac.id')
        ->subject('Pemberitahuan Konfirmasi Reservasi Anda!')
        ->view('mail\email_notification')
        ->with([
            'name' => $this->reservasi->users->name,
            'room_number' => $this->reservasi->rooms->room_number,
            'stay_date' => $this->reservasi->stay_date,
            'period' => $this->reservasi->period,
            'price' => $this->reservasi->rooms->price
        ]);
    }
}
