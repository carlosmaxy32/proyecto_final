<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RegistroExito extends Mailable
{
    use Queueable, SerializesModels;


    public $distressCall;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($distressCall)
    {
        $this->distressCall = $distressCall;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.confirmacion');
    }
}
