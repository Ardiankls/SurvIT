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

class UserSurveyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function update($detail)
    {
        $survey = survey::Find($detail);
        $id = Auth::user()->id;

        $survey->users()->detach($id);
        $survey->users()->attach($id);
        $survey->users()->update([
            'status' => '2'
        ]);

        return redirect()->route('user.index');
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
