<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
// use Mail;

use App\Http\Requests;
use App\Models\survey;
use Illuminate\Support\Facades\Artisan;

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

        return redirect()->route('admin.index', 2);
    }

    public function send_all_demography(Request $request, $point)
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

        return redirect()->route('admin.index', 2);
    }
}
