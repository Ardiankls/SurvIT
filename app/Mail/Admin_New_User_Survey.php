<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Admin_New_User_Survey extends Mailable
{
    use Queueable, SerializesModels;

    public $title;
    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($title, $user)
    {
        $this->title = $title;
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
                    ->subject("ADMIN NOTIF: Responden Survei")
                    ->with(
                        [
                            'title' => $this->title,
                            'user' => $this->user,
                        ])
                    ->view('mail.admin_new_user_survey');
    }
}
