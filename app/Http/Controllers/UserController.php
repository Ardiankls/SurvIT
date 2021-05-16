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

    public function __construct()
    {
//        $this->middleware('auth','verified');
    }


    public function index()
    {
        $pages = "user";
        $user = Auth::user();
        $genders = gender::all()->where('id', '<>', '1');
        $jobs = job::all()->where('id', '<>', '1');
        $interests = interest::all()->where('id', '<>', '1');
        $provinces = province::all()->where('id', '<>', '1');

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

        // $surveys = survey::all()
        //     ->where('gender_id', '=', $ugender || '1')

        // $surveys = survey::all();
        // if($ui != null){
        $surveys = survey::whereHas('interests', function($query) use($ui) {
            $query->whereIn('interest_id', $ui);})->whereHas('jobs', function($query) use($uj) {
                $query->whereIn('job_id', $uj);})->whereHas('provinces', function($query) use($up) {
                    $query->whereIn('province_id', $up);})
                    ->where('user_id', '<>', $id)
                    ->where('limit', '>=', 'count')
                    ->where(function ($query) use($ugender){
                        $query->where('gender_id', '=', $ugender)
                              ->orWhere('gender_id', '=', 1);
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

        $pages = "selesai";

        return view('surveyor.dashboard', compact('genders', 'jobs', 'interests', 'provinces', 'user', 'ugender', 'ujobs', 'uinterests', 'uprovinces', 'surveys', 'usurveys', 'pages'));
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
            'province_id' => $request->province,
            'is_survey_avail' => '1'
        ]);

        $user->jobs()->attach($request->job);
        $user->interests()->attach($request->interest);

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
