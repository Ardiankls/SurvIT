<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\gender;
use App\Models\interest;
use App\Models\job;
use App\Models\User;
use App\Models\survey;
use App\Models\user_interest;
use App\Models\user_job;
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
        $genders = gender::all();
        $jobs = job::all();
        $interests = interest::all();

        $mygender = Auth::gender_id();
        $myjob = Auth::job_id();
        $myinterest = Auth::interest_id();
        //$surveys = survey::all()->where('gender_id', $mygender);
        $surveys = survey::all()->where([
            ['gender_id', '=', $mygender],
            ['job_id', '=', $myjob],
            ['interest_id', '=', $myinterest],
        ]);

        return view('surveyor.dashboard', compact('genders', 'jobs', 'interests', 'user', 'surveys'));
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
        $id = Auth::id();
        $user = User::findOrFail($id);
        $user->update([
            'gender_id' => $request->gender,
            'is_survey_avail' => '1'
        ]);

        user_interest::create([
            'user_id' => $request->gender,
            'interest_id' => $request->interest
        ]);

        user_job::create([
            'user_id' => $request->gender,
            'job_id' => $request->job
        ]);

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
    public function update(Request $request, $id)
    {
        //
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
