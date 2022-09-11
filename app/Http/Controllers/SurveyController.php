<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\Admin_New_Payment;
use App\Mail\Admin_New_Survey;
use App\Mail\Request_Payment;
use App\Mail\Request_Survey;
use App\Models\gender;
use App\Models\interest;
use App\Models\job;
use App\Models\package;
use App\Models\province;
use App\Models\survey;
use App\Models\survey_job;
use App\Models\survey_province;
use App\Models\User;
use App\Models\user_log;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use PDF;

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
        $genders = gender::all();
        $jobs = job::all();
        $interests = interest::all();
        $provinces = province::all()->where('id', '<>', '1')->sortBy('province');
        $packages = package::all();

        $surveys = survey::all()->where('user_id', '=', $id);

        return view('poster.dashboard', compact('genders', 'jobs', 'interests', 'provinces', 'packages', 'surveys'));
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
        $package = package::find($request->package);

        do
        {
            $url = sha1(time());
            $exist = survey::where('url', $url)->get();
        }

        while(!$exist->isEmpty());

        $survey = survey::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'link' => $request->link,
            'edit_link' => $request->edit_link,
            'url' => $url,
            'gender_id' => $request->gender,
            'age_from' => $request->agefrom,
            'age_to' => $request->ageto,
            'point' => $package->point,
            'shareable' => $request->shareable,
            'package_id' => $request->package,
        ]);

        // do
        // {
        //     $url = sha1(time());
        //     $exist = survey::where('url', $url)->get();
        // }
        // while(!$exist->isEmpty());

        // $survey->update([
        //     'url' => $url,
        // ]);

        $survey->jobs()->attach($request->job);
        $survey->interests()->attach($request->interest);
        $survey->provinces()->attach($request->province);

        user_log::create([
            'table' => 'surveys, survey_interests, survey_jobs, survey_provinces',
            'user_id' => Auth::user()->id,
            'log_path' => 'SurveyController@store',
            'log_desc' => Auth::user()->username . ' created survey "' . $survey->title . '"',
        ]);

        if(Auth::user()->is_admin == 1){
            $survey->update([
                'status_id' => 3,
                'opened_at' => Carbon::now()
            ]);

        }else{
            //EMAIL
            Mail::to(Auth::user()->email)->send(new Request_Survey($survey->title));

            //NOTIFY ADMIN
            $admins = [
                "ardiankurniawan7@gmail.com",
                "secondaryjvp@gmail.com",
                "benedictbryan744@gmail.com",
                "aldisama12@gmail.com",
            ];

            foreach($admins as $admin){
                //EMAIL
                Mail::to($admin)->send(new Admin_New_Survey($survey->title, Auth::user()->username));
            }
        }

        return redirect()->route('survey.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(survey $survey)
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
        $survey = survey::find($id);
        $user = Auth::user();

        if($user->id == $survey->user_id || $user->is_admin == 1){
            $genders = gender::all();
            $jobs = job::all();
            $interests = interest::all()->where('id', '<>', '1');
            $provinces = province::all()->where('id', '<>', '1')->sortBy('province');
            $packages = package::all();

            return view('poster.editSurvey', compact('genders', 'jobs', 'interests', 'provinces', 'packages', 'survey', 'user'));
        }

        return redirect()->route('usersurvey.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, survey $survey)
    {
        $survey->update([
            'title' => $request->title,
            'link' => $request->link,
            'edit_link' => $request->edit_link,
            'gender_id' => $request->gender,
            'age_from' => $request->agefrom,
            'age_to' => $request->ageto,
            'shareable' => $request->shareable,
            'package_id' => $request->package,
            'status_id' => 2,
        ]);

        $survey->interests()->detach();
        $survey->interests()->attach($request->interest);

        $sjob = survey_job::all()->where('survey_id', $survey->id)->first();
        $sjob->update([
            'job_id' => $request->job,
        ]);

        $sprovince = survey_province::all()->where('survey_id', $survey->id)->first();
        $sprovince->update([
            'province_id' => $request->province,
        ]);

        user_log::create([
            'table' => 'surveys, survey_interests, survey_jobs, survey_provinces',
            'user_id' => Auth::user()->id,
            'log_path' => 'SurveyController@update',
            'log_desc' => Auth::user()->username . ' updated survey "' . $survey->title . '"',
        ]);

        //YANG BUAT KALO ADMIN
        if($survey->user->is_admin == '1') {
            $survey->update([
                'status_id' => 3,
            ]);
        } else {
            //NOTIFY ADMIN
            $admins = [
                "ardiankurniawan7@gmail.com",
                "secondaryjvp@gmail.com",
                "benedictbryan744@gmail.com",
                "aldisama12@gmail.com",
            ];

            foreach($admins as $admin){
                //EMAIL
                Mail::to($admin)->send(new Admin_New_Survey($survey->title, Auth::user()->username));
            }
        }

        // foreach($admins as $admin){
        //     if($survey->user_id == $admin->id){
        //         $survey->update([
        //             'status_id' => 3,
        //         ]);
        //     }
        // }

        return redirect()->route('survey.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(survey $survey)
    {
        // user_log::create([
        //     'table' => 'surveys',
        //     'user_id' => Auth::user()->id,
        //     'log_path' => 'SurveyController@destroy',
        //     'log_desc' => Auth::user()->username . ' deleted survey "' . $survey->title . '"',
        // ]);

        // $survey->jobs()->detach();
        // $survey->interests()->detach();
        // $survey->provinces()->detach();
        // $survey->users()->detach();
        // $survey->delete();

        return redirect()->route('survey.index');
    }

    public function payment(Request $request, $id)
    {
        $survey = survey::findOrFail($id);
        if ($request->file != null) {
            $data = $request->validate([
                'file' => 'image',
            ]);
            if ($request->has('file')) {
                $file_name = time() . '-' . $data['file']->getClientOriginalName();
                $request->file->move(public_path('images/payment/survey'), $file_name);
                $survey->update([
                    'status_id' => '5',
                    'evidence' => $file_name,
                ]);
            }

            user_log::create([
                'table' => 'surveys',
                'user_id' => Auth::user()->id,
                'log_path' => 'SurveyController@payment',
                'log_desc' => Auth::user()->username . ' payed survey "' . $survey->title . '"',
            ]);

            //EMAIL
            Mail::to(Auth::user()->email)->send(new Request_Payment($survey->title, $survey->point));

            //NOTIFY ADMIN
            $admins = [
                "ardiankurniawan7@gmail.com",
                "secondaryjvp@gmail.com",
                "benedictbryan744@gmail.com",
                "aldisama12@gmail.com",
            ];

            foreach($admins as $admin){
                //EMAIL
                Mail::to($admin)->send(new Admin_New_Payment($survey->title, $survey->point, Auth::user()->username));
            }
        }

        return redirect()->route('survey.index');
    }

    public function pdfGuide(Request $request)
    {
        $filename = 'PetunjukPembuatanSurvey.pdf';
        $path = public_path($filename);

        return response()->file($path);
    }
}
