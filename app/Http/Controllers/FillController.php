<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\survey;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class FillController extends Controller
{
    public function fill($url){

        $user = Auth::user();
        $survey = survey::where('url', $url)->get()->first();

        if($survey->shareable == 1){
            return view('surveyor.survey', compact('survey', 'user'));
        }

        if(Auth::user() == null){
            return redirect()->route('login');
        }

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

        $survey = survey::where('url', $url)->whereHas('interests', function($query) use($ui) {
                        $query->whereIn('interest_id', $ui);
                    })
                    ->whereHas('jobs', function($query) use($uj) {
                        $query->whereIn('job_id', $uj);
                    })
                    ->whereHas('provinces', function($query) use($up) {
                        $query->whereIn('province_id', $up);
                    })
                    ->where('user_id', '<>', $id)
                    ->where('status_id', 3)
                    ->whereHas('package', function($query) {
                        $query->whereColumn('count', '<', 'respondent');
                    })
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
                        ->orWhereHas('usersurvey', function($query) {
                            $query->whereHas('point_log', function($query) {
                                $query->where('status_id', 1);
                            });
                        });
                    })
                    ->orderBy('point', 'DESC')
                    ->get();

        if(!$survey->isEmpty()){
            $survey = $survey->first();
            // dd($survey);
            return view('surveyor.survey', compact('survey', 'user'));
        }
        else{
            return redirect()->route('usersurvey.index');
        }
    }
}
