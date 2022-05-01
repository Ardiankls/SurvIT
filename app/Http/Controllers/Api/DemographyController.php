<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\Api\DemographyResource;
use App\Http\Resources\Api\InterestResource;
use App\Http\Resources\Api\JobResource;
use App\Http\Resources\Api\ProvinceResource;
use App\Http\Resources\Api\GenderResource;
use App\Models\user_survey;
use App\Models\survey;
use App\Models\gender;
use App\Models\interest;
use App\Models\job;
use App\Models\province;
use App\Models\User;

class DemographyController extends Controller
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
        $provinces = province::all()->where('id', '<>', '1')->sortBy('province');

        return new DemographyResource($user);
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

        return response()->json(['Demography Saved']);
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

    public function gender()
    {
        $genders = gender::all()->where('id', '<>', '1');
        return GenderResource::collection($genders);
    }

    public function interest()
    {
        $interests = interest::all()->where('id', '<>', '1');
        return InterestResource::collection($interests);
    }

    public function job()
    {
        $jobs = job::all()->where('id', '<>', '1');
        return JobResource::collection($jobs);
    }

    public function province()
    {
        $provinces = province::all()->where('id', '<>', '1')->sortBy('province');
        return ProvinceResource::collection($provinces);
    }

    public function addInterest(Request $request)
    {
        $id = Auth::user()->id;
        $user = User::findOrFail($id);
        $user->interests()->attach($request->interest);
    }
}
