<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\user_survey;
use App\Models\survey;
use App\Models\gender;
use App\Models\interest;
use App\Models\job;
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
            $query->whereIn('interest_id', $ui);})->whereHas('jobs', function($query) use($uj) {
                $query->whereIn('job_id', $uj);})->whereHas('provinces', function($query) use($up) {
                    $query->whereIn('province_id', $up);})
                    ->where('user_id', '<>', $id)
                    ->whereColumn('count', '<', 'limit')
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
                        ->orWhereExists(function ($query) {
                            $query->from('user_surveys')
                                ->whereColumn('user_surveys.survey_id', 'surveys.id')
                                ->where('user_surveys.status', 1);
                        });
                    })
                    ->get();


        // foreach ($surveys as $survey){
        //     $sinterests[] = $survey->interests;
        // }

        // dd($up);

        return view('surveyor.dashboard', compact('genders', 'jobs', 'interests', 'provinces', 'user', 'surveys', 'pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $id = Auth::user()->id;
        $genders = gender::all();
        $jobs = job::all();
        $interests = interest::all();
        $provinces = province::all()->where('id', '<>', '1')->sortBy('province');

        $usurveys = user_survey::all()->where('status', '2');

        return view('admin.dashboard', compact('user', 'genders', 'jobs', 'interests', 'provinces', 'usurveys'));
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
    public function show($id)
    {
        $user = Auth::user();
        $usurveys = user_survey::all()->where('user_id', $id);
        return view('surveylog', compact('usurveys', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\user_survey  $user_survey
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $survey = survey::Find($id);
        $user = Auth::user()->id;
        $check = user_survey::where('survey_id', $id)->where('user_id', $user)->first();
        if(!$check){
            $survey->users()->attach($user);
        }else{
            $survey->users()->update([
                'status' => '2'
            ]);
        }

        return redirect()->route('usersurvey.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\user_survey  $user_survey
     * @return \Illuminate\Http\Response
     */
    public function update($detail)
    {
        $usurvey = user_survey::Find($detail);
        $usurvey->update([
            'status' => '3'
        ]);

        $point = $usurvey->survey->pay;
        $user = User::Find($usurvey->user_id);
        $user->update([
            'point' => $user->point + $point
        ]);

        $survey = survey::Find($usurvey->survey_id);
        $survey->update([
            'count' => $survey->count + 1
        ]);

        return redirect()->route('usersurvey.create');
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
