<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
// use Mail;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\MalasngodingEmail;

class MailController extends Controller
{

   public function basic_email() {
      $data = array('name'=>"SurvIT Team");

      Mail::send(['text'=>'mail'], $data, function($message) {
         $message->to('jvalentino@student.ciputra.ac.id', 'User')->subject
            ('Survey Baru');
         $message->from('survitsurvey@gmail.com','SurvIT Team');
      });
      echo "Basic Email Sent. Check your inbox.";

    //   Mail::to("testing@malasngoding.com")->send(new MalasngodingEmail());

   }

   public function html_email() {
      $data = array('name'=>"SurvIT Team");
      Mail::send('mail', $data, function($message) {
        $message->to('akurniawan06@student.ciputra.ac.id', 'User')->subject
            ('Survey Baru');
        $message->from('survitsurvey@gmail.com','SurvIT Team');
      });
      echo "HTML Email Sent. Check your inbox.";

   }

   public function attachment_email() {
      $data = array('name'=>"Virat Gandhi");
      Mail::send('mail', $data, function($message) {
         $message->to('jvalentino@student.ciputra.ac.id', 'Tutorials Point')->subject
            ('Laravel Testing Mail with Attachment');
         $message->attach('C:\laravel-master\laravel\public\uploads\image.png');
         $message->attach('C:\laravel-master\laravel\public\uploads\test.txt');
         $message->from('xyz@gmail.com','Virat Gandhi');
      });
      echo "Email Sent with attachment. Check your inbox.";
   }
}
