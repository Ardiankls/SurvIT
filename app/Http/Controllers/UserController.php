<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\gender;
use App\Models\interest;
use App\Models\job;
use App\Models\User;
use App\Models\survey;
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

        $id = Auth::user()->id;
        $uinterests = User::find($id)->interests;
        $ujobs = User::find($id)->jobs;
        $ugender = User::find($id)->gender_id;

        $surveys = survey::all();

        // $demographies = array($uinterests, $ujobs, $surveys, $sinterests, $sjobs);
        // dd($demographies);

        return view('surveyor.dashboard', compact('genders', 'jobs', 'interests', 'user', 'uinterests', 'ugender', 'ujobs', 'surveys'));
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
