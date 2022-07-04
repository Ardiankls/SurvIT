<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
// use Mail;

use App\Http\Requests;
use App\Mail\Send_Custom_Mail_Current;
use App\Models\survey;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function send_new_demography(Request $request, $point) {

        // $details = [
    	// 	'subject' => 'Yuk Dapatkan EKSTRA POIN Dari Survit'
    	// ];

    	// send all mail in the queue.
        $job = (new \App\Mail\Blast_New_Demography($point))
            ->delay(
            	now()
            	->addSeconds(2)
            );

        dispatch($job);

        // echo "Bulk mail send successfully in the background...";
        Artisan::call('queue:listen');

        return redirect()->route('admin.index', 5);

    }

    public function send_match_demography(Request $request, survey $survey)
    {
    	// $details = [
    	// 	'subject' => 'Yuk Dapatkan EKSTRA POIN Dari Survit'
    	// ];

    	// send all mail in the queue.
        $job = (new \App\Mail\Blast_Match_New_Survey($survey))
            ->delay(
            	now()
            	->addSeconds(2)
            );

        dispatch($job);

        // echo "Bulk mail send successfully in the background...";
        Artisan::call('queue:listen');

        return redirect()->route('admin.index', 5);
    }

    public function send_all_demography(Request $request)
    {
    	// $details = [
    	// 	'subject' => 'Yuk Dapatkan EKSTRA POIN Dari Survit'
    	// ];

    	// send all mail in the queue.
        $job = (new \App\Mail\Blast_All_New_Survey())
            ->delay(
            	now()
            	->addSeconds(2)
            );

        dispatch($job);

        // echo "Bulk mail send successfully in the background...";
        Artisan::call('queue:listen');

        return redirect()->route('admin.index', 5);
    }

    public function send_custom_receiver(Request $request)
    {
    	// $details = [
    	// 	'subject' => 'Yuk Dapatkan EKSTRA POIN Dari Survit'
    	// ];

        $receiver = $request->receiver;
        $subject = $request->subject;
        $contents = $request->contents;
        Mail::to($receiver)->send(new Send_Custom_Mail_Current($subject, $contents));

    	// send all mail in the queue.
        // $job = (new \App\Mail\Send_Custom_Mail($receiver, $subject, $message))
        //     ->delay(
        //     	now()
        //     	->addSeconds(2)
        //     );

        // dispatch($job);

        // echo "Bulk mail send successfully in the background...";
        // Artisan::call('queue:listen');

        return redirect()->route('admin.index', 5);
    }
}
