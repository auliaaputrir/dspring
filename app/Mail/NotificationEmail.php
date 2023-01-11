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
    protected $reservasi;
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
    {   return $this
        ->from('coba.aulia@gmail.com')
        ->subject($this->reservasi->message)
        ->view('mail\email')
        ->with([
            'reservasi' => $this->reservasi
        ]);
    }
}
