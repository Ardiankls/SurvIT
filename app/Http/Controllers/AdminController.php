<?php

namespace App\Http\Controllers;

use App\Mail\Broadcast_Decline;
use App\Models\point_log;
use App\Models\survey;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    public function index()
    {
        // if($type == 1){
            $usurveys = point_log::all()->where('status_id', '2')->where('user_survey_id', '<>', null);
            // return view('admin.dashboard', compact('usurveys'));
        // }else if($type == 2){
            $surveys = survey::all()->where('status_id', '2');
            // return view('admin.dashboard', compact('surveys'));
        // }else if($type == 3){
            $upayments = point_log::all()->where('status_id', '2')->where('account_payment_id', '<>', null);
            // dd($usurveys);
            return view('admin.dashboard', compact('usurveys', 'surveys', 'upayments'));
        // }
    }

    public function updateUserSurvey($id, String $action)
    {
        $point_log = point_log::findorfail($id);
        $user = User::Find($point_log->usersurvey->user_id);

        if($action == 'accept'){
            $point_log->update([
                'status_id' => '3',
            ]);

            $point = $point_log->point;
            $user->update([
                'point' => $user->point + $point
            ]);

            $survey = survey::Find($point_log->usersurvey->survey_id);
            $survey->update([
                'count' => $survey->count + 1
            ]);
        }

        if($action == 'decline'){
            $title = $point_log->usersurvey->survey->title;
            Mail::to($user->email)->send(new Broadcast_Decline($title));
            $point_log->update([
                'status_id' => '1',
            ]);
        }

        return redirect()->route('admin.index');
    }

    public function updateSurvey(survey $survey, String $action)
    {
        if($action == 'accept'){
            $survey->update([
                'status_id' => '3',
                'opened_at' => Carbon::now()
            ]);
        }

        if($action == 'decline'){
            $survey->update([
                'status_id' => '1',
            ]);
        }

        return redirect()->route('admin.index');
    }

    public function updatePoint($id)
    {
        $point_log = point_log::findorfail($id);
        $point_log->update([
            'status_id' => '3',
        ]);

        return redirect()->route('admin.index');
    }
}
