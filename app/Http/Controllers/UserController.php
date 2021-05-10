<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\gender;
use App\Models\interest;
use App\Models\job;
use App\Models\province;
use App\Models\User;
use App\Models\survey;
use App\Models\user_survey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $genders = gender::all()->where('id', '<>', '1');
        $jobs = job::all()->where('id', '<>', '1');
        $interests = interest::all()->where('id', '<>', '1');
        $provinces = province::all()->where('id', '<>', '1');

        $id = Auth::user()->id;
        $ugender = User::find($id)->gender_id;
        $ujobs = User::find($id)->jobs;
        $uinterests = User::find($id)->interests;
        $uprovinces = User::find($id)->provinces;

        $surveys = survey::all()->where('user_id', '<>', $id);
        $usurveys = user_survey::all()->where('user_id', '=', $id);

        // $demographies = array($uinterests, $ujobs, $surveys, $sinterests, $sjobs);
        // dd($demographies);

        // foreach ($surveys as $survey){
        //     $sinterests = $survey->interests;
        //     $sjobs = $survey->jobs;
        //     $sgender = $survey->gender_id;
        //     $sprovinces = $survey->provinces;
        //                             foreach ($sinterests as $sinterest){}
        //                             foreach ($sjobs as $sjob){}
        //                             foreach ($sprovinces as $sprovince){}
        //                             foreach ($uinterests as $uinterest){}
        //                             foreach ($ujobs as $ujob){}
        //                             foreach ($uprovinces as $uprovince){}

        //                             if ($sgender == $ugender || $sgender == '1'){
        //                                 if ($sinterest->pivot->interest_id == $uinterest->pivot->interest_id || $sinterest->pivot->interest_id == '1'){
        //                                     if ($sjob->pivot->job_id == $ujob->pivot->job_id || $sjob->pivot->job_id == '1'){
        //                                         if ($sprovince->pivot->province_id == $uprovince->pivot->province_id || $sprovince->pivot->province_id == '1'){
        //                                             // $user->surveys()->attach($survey);

        //                                         }
        //                                     }
        //                                 }
        //                             }

        // }

        return view('surveyor.dashboard', compact('genders', 'jobs', 'interests', 'provinces', 'user', 'ugender', 'ujobs', 'uinterests', 'uprovinces', 'surveys', 'usurveys'));
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
        $id = Auth::user()->id;
        $user = User::findOrFail($id);
        $user->update([
            'gender_id' => $request->gender,
            'is_survey_avail' => '1'
        ]);

        $user->jobs()->attach($request->job);
        $user->interests()->attach($request->interest);
        $user->provinces()->attach($request->province);

        return redirect()->route('user.index');
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $survey)
    {
        $id = User::Auth()->id;
        $survey->surveys()->attach($id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
