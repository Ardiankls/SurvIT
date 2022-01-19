<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\gender;
use App\Models\interest;
use App\Models\job;
use App\Models\province;
use App\Models\User;
use Carbon\Carbon;
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
        //Demography
        $user = Auth::user();
        $genders = gender::all()->where('id', '<>', '1');
        $jobs = job::all()->where('id', '<>', '1');
        $interests = interest::all()->where('id', '<>', '1');
        $provinces = province::all()->where('id', '<>', '1')->sortBy('province');

        $days = 30;
        $editable = false;
        if($user->edited_at){
            $days = Carbon::parse($user->edited_at)->diffInDays(Carbon::now());
            if($days >= 30){
                $editable = true;
            }
        }
        // dd($days);

        return view('profile', compact('user', 'genders', 'jobs', 'interests', 'provinces', 'days'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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

        return redirect()->route('usersurvey.index');
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
        $user = User::find($id);
        return view('editProfile', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, String $which)
    {
        $id = Auth::user()->id;
        $user = User::findOrFail($id);

        if($which == "profile"){
            $user->update([
                'username' => $request->username,
                'email' => $request->email,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'phone' => $request->phone,
            ]);
        }

        if($which == 'demography'){
            $user->update([
                'edited_at' => Carbon::now(),
                'gender_id' => $request->gender,
                'province_id' => $request->province,
            ]);

            $user->interests()->detach();
            $user->interests()->attach($request->interest);

            $user->jobs()->detach();
            $user->jobs()->attach($request->job);
        }

        return redirect()->route('user.index');
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
