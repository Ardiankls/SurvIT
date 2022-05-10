<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\survey;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class FillController extends Controller
{
    public function fill($url){
        $survey = survey::where('url', $url)->get()->first();

        if($survey->shareable == 1){
            return view('surveyor.survey', compact('survey', 'user'));
        }

        if(Auth::user() == null){
            return redirect()->route('login');
        }

        $user = Auth::user();
        $id = $user->id;
        $ugender = $user->gender_id;
        $uprovince = $user->province_id;
        $ujobs = $user->jobs;
        $uinterests = $user->interests;

        $ui = [1];
        $uj = [1];
        $up = [1, $uprovince];

        foreach ($uinterests as $uinterest){
            $ui[] = $uinterest->pivot->interest_id;
        }

        foreach ($ujobs as $ujob){
            $uj[] = $ujob->pivot->job_id;
        }

        $age = date_diff(date_create($user->birthdate), date_create('now'))->y;

        $survey = survey::where('url', $url)
                    ->where(function ($query) use($url, $ui, $uj, $up, $ugender, $age, $id){
                    $query->where('status_id', 3)
                        ->whereHas('interests', function($query) use($ui) {
                            $query->whereIn('interest_id', $ui);
                        })
                        ->whereHas('jobs', function($query) use($uj) {
                            $query->whereIn('job_id', $uj);
                        })
                        ->whereHas('provinces', function($query) use($up) {
                            $query->whereIn('province_id', $up);
                        })
                        ->where(function ($query) use($ugender){
                            $query->where('gender_id', '=', $ugender)
                                ->orWhere('gender_id', '=', 1);
                        })
                        ->where('age_from', '<=', $age)
                        ->where('age_to', '>=', $age)
                        ->whereHas('package', function($query) {
                            $query->whereColumn('count', '<', 'respondent');
                        })
                        ->where(function ($query) use($id) {
                            $query->whereNotExists(function ($query) use($id) {
                                $query->from('user_surveys')
                                    ->whereColumn('user_surveys.survey_id', 'surveys.id')
                                    ->where('user_surveys.user_id', $id);
                            })
                            ->orWhereHas('usersurvey', function($query) use($id) {
                                $query->whereColumn('survey_id', 'surveys.id')
                                    ->where('user_id', $id)
                                    ->whereHas('point_log', function($query) {
                                    $query->where('status_id', 1);
                                });
                            });
                        })
                        ->orWhere('user_id', $id);
                    })
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
