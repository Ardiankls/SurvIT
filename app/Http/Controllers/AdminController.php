<?php

namespace App\Http\Controllers;

use App\Mail\Decline_Payment;
use App\Mail\Decline_Survey;
use App\Mail\Decline_UserSurvey;
use App\Mail\Success_Payment;
use App\Mail\Success_Survey;
use App\Mail\Success_UserSurvey;
use App\Mail\Success_Withdrawal;
use App\Models\point_log;
use App\Models\survey;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    public function index(int $type)
    {
        $usurveys = point_log::all()->where('status_id', '2')->where('user_survey_id', '<>', null);
        $surveys = survey::where('status_id', '2')->orWhere('status_id', '5')->get();
        $upoints = point_log::all()->where('status_id', '2')->where('account_payment_id', '<>', null);

        if($type == 1){
            return view('admin.usurvey', compact('usurveys'));
        }else if($type == 2){
            return view('admin.survey', compact('surveys'));
        }else if($type == 3){
            return view('admin.payment', compact('surveys'));
        }else if($type == 4){
            return view('admin.point', compact('upoints'));
        }else if($type == 5){
            return view('admin.blast');
        }

        // return view('admin.point', compact('usurveys', 'surveys', 'upoints'));
    }

    public function updateUserSurvey($id, String $action)
    {
        $point_log = point_log::findOrFail($id);
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

            //EMAIL
            $title = $point_log->usersurvey->survey->title;
            Mail::to($user->email)->send(new Success_UserSurvey($title, $point));
        }

        if($action == 'decline'){
            $point_log->update([
                'status_id' => '1',
            ]);

            //EMAIL
            $title = $point_log->usersurvey->survey->title;
            Mail::to($user->email)->send(new Decline_UserSurvey($title));
        }

        return redirect()->route('admin.index', 1);
    }

    public function updateSurvey(survey $survey, String $action)
    {
        $user = User::findOrFail($survey->user_id);

        if($action == 'accept'){
            if($survey->package_id == 1){
                $survey->update([
                    'status_id' => '3',
                    'opened_at' => Carbon::now()
                ]);

                return redirect()->route('mail.blast-new-survey', $survey);

            }else{
                $survey->update([
                    'status_id' => '4',
                ]);
            }

            //EMAIL
            Mail::to($user->email)->send(new Success_Survey($survey->title));

            return redirect()->route('admin.index', 2);
        }

        if($action == 'decline'){
            $survey->update([
                'status_id' => '1',
            ]);

            //EMAIL
            Mail::to($user->email)->send(new Decline_Survey($survey->title));

            return redirect()->route('admin.index', 2);
        }
    }

    public function updatePayment(survey $survey, String $action)
    {
        $user = User::findOrFail($survey->user_id);

        if($action == 'accept'){
            $survey->update([
                'status_id' => '3',
                'opened_at' => Carbon::now()
            ]);

            //EMAIL
            Mail::to($user->email)->send(new Success_Payment($survey->title));
        }

        if($action == 'decline'){
            $survey->update([
                'status_id' => '4',
            ]);

            //EMAIL
            Mail::to($user->email)->send(new Decline_Payment($survey->title));
        }

        return redirect()->route('admin.index', 3);
    }

    public function updatePoint($id)
    {
        $point_log = point_log::findOrFail($id);
        $point_log->update([
            'status_id' => '3',
        ]);

        //EMAIL
        $user = User::findOrFail($point_log->payment->user_id);
        Mail::to($user->email)->send(new Success_Withdrawal($point_log->point, $point_log->payment->bank, $point_log->payment->transfer));

        return redirect()->route('admin.index', 4);
    }

}
