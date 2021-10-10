<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Broadcast extends Mailable
{
    use Queueable, SerializesModels;

    public $subject;
    public $msg;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($subject, $msg)
    {
        $this->subject = $subject;
        $this->msg = $msg;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('survitsurvey@gmail.com','SurvIT')
                    ->with(
                    [
                        'msg' => $this->msg,
                    ])
                    ->subject($this->subject)
                    ->view('mail');
    }
}