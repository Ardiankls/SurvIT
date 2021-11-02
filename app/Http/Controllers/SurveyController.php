<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\gender;
use App\Models\interest;
use App\Models\job;
use App\Models\province;
use App\Models\survey;
use App\Models\survey_interest;
use App\Models\survey_job;
use App\Models\survey_province;
use App\Models\User;
use App\Models\user_survey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SurveyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user()->id;
        $genders = gender::all();
        $jobs = job::all();
        $interests = interest::all();
        $provinces = province::all()->where('id', '<>', '1')->sortBy('province');

        $surveys = survey::all()->where('user_id', '=', $id);

        return view('poster.dashboard', compact('genders', 'jobs', 'interests', 'provinces', 'surveys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $user = Auth::user();
        // $genders = gender::all()->where('id', '<>', '1');
        // $jobs = job::all()->where('id', '<>', '1');
        // $interests = interest::all()->where('id', '<>', '1');
        // $provinces = province::all()->where('id', '<>', '1');

        // $id = Auth::user()->id;
        // $ugender = User::find($id)->gender_id;
        // $ujobs = User::find($id)->jobs;
        // $uinterests = User::find($id)->interests;
        // $uprovinces = User::find($id)->provinces;

        // $surveys = survey::all()->where('user_id', '<>', $id);
        // $usurveys = user_survey::all()->where('user_id', '=', $id);

        // $pages = "selesai";

        // return view('surveyor.dashboard', compact('genders', 'jobs', 'interests', 'provinces', 'user', 'ugender', 'ujobs', 'uinterests', 'uprovinces', 'surveys', 'usurveys', 'pages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $survey = survey::create([
            'title' => $request->title,
            'link' => $request->link,
            'limit' => $request->limit,
            'user_id' => Auth::id(),
            'gender_id' => $request->gender,
        ]);

        if($request->pay != null){
            $survey->update([
                'pay' => $request->pay,
            ]);
        }

        $survey->jobs()->attach($request->job);
        $survey->interests()->attach($request->interest);
        $survey->provinces()->attach($request->province);

        return redirect()->route('survey.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $genders = gender::all();
        $jobs = job::all();
        $interests = interest::all();
        $provinces = province::all()->where('id', '<>', '1')->sortBy('province');

        $survey = survey::find($id);

        return view('poster.editSurvey', compact('genders', 'jobs', 'interests', 'provinces', 'survey'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, survey $survey)
    {
        $survey->update([
            'title' => $request->title,
            'link' => $request->link,
            'limit' => $request->limit,
            'gender_id' => $request->gender,
        ]);

        if($request->pay != null){
            $survey->update([
                'pay' => $request->pay,
            ]);
        }

        $sjob = survey_job::all()->where('survey_id', $survey->id)->first();
        $sjob->update([
            'job_id' => $request->job,
        ]);

        $sinterest = survey_interest::all()->where('survey_id', $survey->id)->first();
        $sinterest->update([
            'interest_id' => $request->interest,
        ]);

        $sprovince = survey_province::all()->where('survey_id', $survey->id)->first();
        $sprovince->update([
            'province_id' => $request->province,
        ]);

        return redirect()->route('survey.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(survey $survey)
    {
        $survey->jobs()->detach();
        $survey->interests()->detach();
        $survey->provinces()->detach();
        $survey->users()->detach();
        $survey->delete();
        return redirect()->route('survey.index');
    }
}
