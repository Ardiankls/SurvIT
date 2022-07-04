<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class Send_Custom_Mail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $receiver, $subject, $message;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($receiver, $subject, $message)
    {
        $this->reveiver = $receiver;
        $this->subject = $subject;
        $this->message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */

    public function handle()
    {
        $targets = $this->receiver;

        $input['subject'] = $this->subject;
        $input['email'] = $targets;
        Mail::send('mail.send_custom_mail', ['message' => $this->message, 'subject' => $this->subject], function($message) use($input){
            $message->to($input['email'])
                ->subject($input['subject']);
        });
    }
}
