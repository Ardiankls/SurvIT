<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Admin_New_Payment extends Mailable
{
    use Queueable, SerializesModels;

    public $title;
    public $point;
    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($title, $point, $user)
    {
        $this->title = $title;
        $this->point = $point;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('survitsurvey@gmail.com','SurvIT')
                    ->subject("ADMIN NOTIF: Pembayaran Paket Survei")
                    ->with(
                        [
                            'title' => $this->title,
                            'point' => $this->point,
                            'user' => $this->user,
                        ])
                    ->view('mail.admin_new_payment');
    }
}
