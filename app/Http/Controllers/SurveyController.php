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
use Carbon\Carbon;
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
        $package = package::find($request->package);

        do
        {
            $url = sha1(time());
            $exist = survey::where('url', $url)->get();
        }

        while(!$exist->isEmpty());
        $survey = survey::create([
            'title' => $request->title,
            'link' => $request->link,
            // 'limit' => $request->limit,
            'user_id' => Auth::id(),
            'gender_id' => $request->gender,
            'point' => $package->point,
            'url' => $url,
            'shareable' => $request->shareable,
            'package_id' => $request->package,
        ]);

        // do
        // {
        //     $url = sha1(time());
        //     $exist = survey::where('url', $url)->get();
        // }
        // while(!$exist->isEmpty());

        // $survey->update([
        //     'url' => $url,
        // ]);

        $survey->jobs()->attach($request->job);
        $survey->interests()->attach($request->interest);
        $survey->provinces()->attach($request->province);

        if(Auth::user()->is_admin == 1){
            $survey->update([
                'status_id' => 3,
                'opened_at' => Carbon::now()
            ]);
        }

        return redirect()->route('survey.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(survey $survey)
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
        $packages = package::all();

        $survey = survey::find($id);

        return view('poster.editSurvey', compact('genders', 'jobs', 'interests', 'provinces', 'packages', 'survey'));
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
            // 'limit' => $request->limit,
            'package_id' => $request->package,
            'gender_id' => $request->gender,
        ]);

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

    public function payment(Request $request, $id)
    {
        $survey = survey::findorfail($id);
        if ($request->file != null) {
            $data = $request->validate([
                'file' => 'image',
            ]);
            if ($request->has('file')) {
                $file_name = time() . '-' . $data['file']->getClientOriginalName();
                $request->file->move(public_path('images\payment\survey'), $file_name);
                $survey->update([
                    'status_id' => '5',
                    'evidence' => $file_name,
                ]);
            }
        }

        return redirect()->route('survey.index');
    }
}
