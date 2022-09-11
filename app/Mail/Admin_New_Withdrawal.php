<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Admin_New_Withdrawal extends Mailable
{
    use Queueable, SerializesModels;

    public $point;
    public $bank_name;
    public $bank_account;
    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($point, $bank_name, $bank_account, $user)
    {
        $this->point = $point;
        $this->bank_name = $bank_name;
        $this->bank_account = $bank_account;
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
                    ->subject("ADMIN NOTIF: Penarikan Poin")
                    ->with(
                        [
                            'point' => $this->point,
                            'bank_name' => $this->bank_name,
                            'bank_account' => $this->bank_account,
                            'user' => $this->user,
                        ])
                    ->view('mail.admin_new_withdrawal');
    }
}
