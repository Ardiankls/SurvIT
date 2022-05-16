<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class Blast_All_New_Survey implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */

    public function handle()
    {
        $users = User::where('id', '>', 8);

        $targets = $users->get();
        // dd($targets);

        $input['subject'] = 'Ada Survei Baru Buat Kamu';

        foreach ($targets as $key => $value) {
            $input['email'] = $value->email;
            $input['name'] = $value->name;
            Mail::send('mail.blast_new_survey', [], function($message) use($input){
                $message->to($input['email'], $input['name'])
                    ->subject($input['subject']);
            });
        }
    }
}
