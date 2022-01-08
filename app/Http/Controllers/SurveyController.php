<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\gender;
use App\Models\interest;
use App\Models\job;
use App\Models\package;
use App\Models\province;
use App\Models\survey;
use App\Models\survey_job;
use App\Models\survey_province;
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
        $packages = package::all();

        $surveys = survey::all()->where('user_id', '=', $id);

        return view('poster.dashboard', compact('genders', 'jobs', 'interests', 'provinces', 'packages', 'surveys'));
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
        $survey = survey::create([
            'title' => $request->title,
            'link' => $request->link,
            'limit' => $request->limit,
            'user_id' => Auth::id(),
            'gender_id' => $request->gender,
            'package_id' => '1',
            'shareable' => $request->shareable,
            'status_id' => 2,
        ]);

        if($request->pay != null){
            $survey->update([
                'pay' => $request->pay,
            ]);
        }

        if(Auth::user()->is_admin == 1){
            $survey->update([
                'status_id' => 3,
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
        $interests = interest::all()->where('id', '<>', '1');
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

        $survey->interests()->detach();
        $survey->interests()->attach($request->interest);

        $sjob = survey_job::all()->where('survey_id', $survey->id)->first();
        $sjob->update([
            'job_id' => $request->job,
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
