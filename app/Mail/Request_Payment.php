<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Request_Payment extends Mailable
{
    use Queueable, SerializesModels;

    public $title;
    public $point;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($title, $point)
    {
        $this->title = $title;
        $this->point = $point;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('survitsurvey@gmail.com','SurvIT')
                    ->subject("Pembayaranmu Sedang Diproses")
                    ->with(
                        [
                            'title' => $this->title,
                            'point' => $this->point,
                        ])
                    ->view('mail.request_payment');
    }
}
