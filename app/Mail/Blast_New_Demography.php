<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class Blast_New_Demography implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

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
    public function handle()
    {
        $point = $this->point;
        $users = User::where('id', '>', 8)
                    ->where('birthdate', null)
                    ->where('is_survey_avail', '1');

        $targets = $users->get();

        $input['subject'] = 'Yuk Dapatkan EKSTRA POIN Dari Survit';

        foreach ($targets as $key => $value) {
            $input['email'] = $value->email;
            $input['name'] = $value->name;

            Mail::send('mail.blast_new_demography', ['point' => $point], function($message) use($input){
                $message->to($input['email'], $input['name'])
                    ->subject($input['subject']);
            });
        }
    }
}
