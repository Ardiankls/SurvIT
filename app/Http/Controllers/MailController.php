<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
// use Mail;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Mail\Blast_New_Demography;
use App\Mail\Blast_New_Survey;
use Illuminate\Support\Facades\Mail;
use App\Models\User;

class MailController extends Controller
{
    public function add_demography_email() {
        $users = User::where('id', '>' , '8')
                    ->where('birthdate' == null)
                    ->where('is_survey_avail' == '1')
                    ->get();

        dd($users);
        foreach($users as $user){
            Mail::to($user->email)->send(new Blast_New_Demography(500));
        }
    }
}
