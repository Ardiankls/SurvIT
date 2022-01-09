<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\Api\SurveyResource;
use App\Models\user_survey;
use App\Models\survey;
use App\Models\gender;
use App\Models\interest;
use App\Models\job;
use App\Models\province;
use App\Models\User;

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

        $surveys = survey::whereHas('interests', function($query) use($ui) {
            $query->whereIn('interest_id', $ui);})->whereHas('jobs', function($query) use($uj) {
                $query->whereIn('job_id', $uj);})->whereHas('provinces', function($query) use($up) {
                    $query->whereIn('province_id', $up);})
                    ->where('user_id', '<>', $id)
                    ->whereColumn('count', '<', 'limit')
                    ->where(function ($query) use($ugender){
                        $query->where('gender_id', '=', $ugender)
                              ->orWhere('gender_id', '=', 1);
                    })
                    ->where(function ($query) use($id) {
                        $query->whereNotExists(function ($query) use($id) {
                            $query->from('user_surveys')
                                ->whereColumn('user_surveys.survey_id', 'surveys.id')
                                ->where('user_surveys.user_id', $id);
                        })
                        ->orWhereExists(function ($query) {
                            $query->from('user_surveys')
                                ->whereColumn('user_surveys.survey_id', 'surveys.id')
                                ->where('user_surveys.status', 1);
                        });
                    })
                    ->get();
        
        return SurveyResource::collection($surveys);
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
}
