<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Broadcast_Convert extends Mailable
{
    use Queueable, SerializesModels;

    public $point;
    public $bank_account;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($point, $bank_account)
    {
        $this->point = $point;
        $this->$bank_account = $bank_account;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('survitsurvey@gmail.com','SurvIT')
                    ->subject("Ada Survei Baru Buat Kamu")
                    ->with(
                        [
                            'point' => $this->point,
                            'bank_account' => $this->bank_account,
                        ])
                    ->view('mail.penarikan_pengajuan');
    }
}
