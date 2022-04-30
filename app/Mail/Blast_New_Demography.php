<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Blast_New_Demography extends Mailable
{
    use Queueable, SerializesModels;

    public $point;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($point)
    {
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
                    ->subject("Yuk Dapatkan EKSTRA POIN Dari Survit")
                    ->with(
                        [
                            'point' => $this->point,
                        ])
                    ->view('mail.blast_new_demography');
    }
}
