<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Success_Withdrawal extends Mailable
{
    use Queueable, SerializesModels;

    public $point;
    public $bank_name;
    public $bank_account;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($point, $bank_name, $bank_account)
    {
        $this->point = $point;
        $this->bank_name = $bank_name;
        $this->bank_account = $bank_account;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('survitsurvey@gmail.com','SurvIT')
                    ->subject("Penarikan Poin Selesai")
                    ->with(
                        [
                            'point' => $this->point,
                            'bank_name' => $this->bank_name,
                            'bank_account' => $this->bank_account,
                        ])
                    ->view('mail.success_withdrawal');
    }
}
