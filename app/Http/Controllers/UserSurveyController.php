<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\account_payment;
use App\Models\user_survey;
use App\Models\survey;
use App\Models\gender;
use App\Models\interest;
use App\Models\job;
use App\Models\point_log;
use App\Models\province;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Exists;

class UserSurveyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Demography
        $pages = "user";
        $user = Auth::user();
        $genders = gender::all()->where('id', '<>', '1');
        $jobs = job::all()->where('id', '<>', '1');
        $interests = interest::all()->where('id', '<>', '1');
        $provinces = province::all()->where('id', '<>', '1')->sortBy('province');

        //Survey List
        $id = Auth::user()->id;
        $ugender = User::find($id)->gender_id;
        $uprovince = User::find($id)->province_id;
        $ujobs = User::find($id)->jobs;
        $uinterests = User::find($id)->interests;
        $ui = [1];
        $uj = [1];
        $up = [1, $uprovince];

        foreach ($uinterests as $uinterest){
            $ui[] = $uinterest->pivot->interest_id;
        }

        foreach ($ujobs as $ujob){
            $uj[] = $ujob->pivot->job_id;
        }

        $surveys = survey::whereHas('interests', function($query) use($ui) {
                        $query->whereIn('interest_id', $ui);
                    })
                    ->whereHas('jobs', function($query) use($uj) {
                        $query->whereIn('job_id', $uj);
                    })
                    ->whereHas('provinces', function($query) use($up) {
                        $query->whereIn('province_id', $up);
                    })
                    ->where('user_id', '<>', $id)
                    ->where('status_id', 3)
                    ->whereHas('package', function($query) {
                        $query->whereColumn('count', '<', 'respondent');
                    })
                    ->where(function ($query) use($ugender){
                        $query->where('gender_id', '=', $ugender)
                              ->orWhere('gender_id', '=', 1);
                    })
                    ->where(function ($query) use($id) {
                        $query->whereNotExists(function ($query) use($id) {
                            $query->from('user_surveys')
                                ->whereColumn('user_surveys.survey_id', 'surveys.id')
                                ->where('user_surveys.user_id', $id);
                        })
                        ->orWhereHas('usersurvey', function($query) {
                            $query->whereHas('point_log', function($query) {
                                $query->where('status_id', 1);
                            });
                        });
                    })
                    ->orderBy('point', 'DESC')
                    ->get();

        //Point
        $upoint = 0;
        $payments = account_payment::all()->where('user_id', $user->id);

        $pid = [];
        foreach($payments as $payment){
            $pid[] = $payment->id;
        }

        $pointlogs = point_log::WhereIn('account_payment_id', $pid)
                            ->where('status_id', 2)
                            ->get();

        foreach($pointlogs as $pointlog){
            $upoint += $pointlog->point;
        }
        // dd($upoint);

        return view('surveyor.dashboard', compact('user', 'genders', 'jobs', 'interests', 'provinces', 'surveys', 'upoint', 'pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\user_survey  $user_survey
     * @return \Illuminate\Http\Response
     */
    public function show(user_survey $user_survey)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\user_survey  $user_survey
     * @return \Illuminate\Http\Response
     */
    public function edit(user_survey $user_survey)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\user_survey  $user_survey
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $survey = survey::Find($id);
        $user = Auth::user()->id;
        $check = user_survey::where('survey_id', $id)->where('user_id', $user)->first();
        if(!$check){
            // $survey->users()->attach($user, [
            //     'point' => $survey->pay,
            // ]);
            $survey->users()->attach($user);

            $usurvey = user_survey::where('survey_id', $id)->where('user_id', $user)->get()->first();
            point_log::create([
                'type' => '0',
                'status_id' => '2',
                'point' => $survey->point,
                'user_survey_id' => $usurvey->id,
            ]);

        }else{
            $check->point_log->first()->update([
                'status_id' => '2'
            ]);
        }

        return redirect()->route('usersurvey.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\user_survey  $user_survey
     * @return \Illuminate\Http\Response
     */
    public function destroy(user_survey $user_survey)
    {
        //
    }
}
