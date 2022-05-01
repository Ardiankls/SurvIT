<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\Blast_New_Demography;
use App\Mail\Success_Add_Demography;
use App\Models\gender;
use App\Models\interest;
use App\Models\job;
use App\Models\point_log;
use App\Models\province;
use App\Models\User;
use App\Models\user_campaign;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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
        // $user = Auth::user();
        // if($user->birthdate == null){
        //     return view('addDemography', compact('user'));
        // }

        // return redirect()->route('user.index');
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
            'birthdate' => $request->birthdate,
            'gender_id' => $request->gender,
            'province_id' => $request->province,
            'is_survey_avail' => '1'
        ]);

        $user->jobs()->attach($request->job);
        $user->interests()->attach($request->interest);

        //POINT LOG
        $user->update([
            'point' => $user->point + 500,
        ]);

        $ucampaign = user_campaign::create([
            'user_id' => $id,
            'campaign_id' => 2,
        ]);

        point_log::create([
            'type' => '0',
            'status_id' => '3',
            'point' => 500,
            'user_campaign_id' => $ucampaign->id,
        ]);

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
                'birthdate' => $request->birthdate,
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

    public function addDemography(Request $request)
    {
        $id = Auth::user()->id;
        $user = User::findOrFail($id);

        if($user->birthdate == null){
            $user->update([
                'birthdate' => $request->birthdate,
                'point' => $user->point + 500,
            ]);

            $ucampaign = user_campaign::create([
                'user_id' => $id,
                'campaign_id' => 2,
            ]);

            point_log::create([
                'type' => '0',
                'status_id' => '3',
                'point' => 500,
                'user_campaign_id' => $ucampaign->id,
            ]);

            //MAIL
            Mail::to($user->email)->send(new Success_Add_Demography(500));
        }

        return redirect()->route('usersurvey.index');
    }
}
