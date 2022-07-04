<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Send_Custom_Mail_Current extends Mailable
{
    use Queueable, SerializesModels;

    public $subject, $contents;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($subject, $contents)
    {
        $this->subject = $subject;
        $this->contents = $contents;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('survitsurvey@gmail.com','SurvIT')
                    ->subject($this->subject)
                    ->with(
                        [
                            'subject' => $this->subject,
                            'contents' => $this->contents,
                        ])
                    ->view('mail.send_custom_mail');
    }
}
