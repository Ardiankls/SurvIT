<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\Blast_New_Demography;
use App\Mail\Blast_New_Survey;
use App\Models\gender;
use App\Models\interest;
use App\Models\job;
use App\Models\province;
use App\Models\User;
use App\Models\user_job;
use App\Models\user_interest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

class MailController extends Controller
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
        $interests = interest::all()->where('id', '<>', '1');
        $provinces = province::all()->where('id', '<>', '1')->sortBy('province');

        return view('admin.mail', compact('genders', 'jobs', 'interests', 'provinces'));
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
        $ujobs = user_job::all();
        $uinterests = user_interest::all();
        $provinces = province::all()->where('id', '<>', '1');
        $genders = gender::all()->where('id', '<>', '1');

        // whereIn buat array
        // whereHas buat many to many

        //GENDER
        if($request->gender > 1){
            $genders = $genders->where('id', $request->gender);
        }
        foreach ($genders as $gender){
            $ug[] = $gender->id;
        }

        //JOB
        $uj = [];
        if($request->job > 1){
            $ujobs = $ujobs->where('job_id', $request->job);
        }
        foreach ($ujobs as $ujob){
            $uj[] = $ujob->job_id;
        }

        //INTEREST
        $iusers_id = [];
        $iusers = [];
        $iuser_id = [];
        if($request->interest[0] > 1){
            $a[] = $uinterests->whereIn('interest_id', $request->interest); //semua user yang memiliki salah satu interest
            foreach($a as $b){
                foreach($b as $c){
                    $iusers_id[] = $c->user_id;
                }
            }
            $unique = array_values(array_unique($iusers_id)); //id semua user yang memiliki salah satu interest
            $ucount = count($unique);
            $icount = count(array_unique($request->interest));
            for ($x = 0 ; $x < $ucount; $x++) {
                $iuser[] = $uinterests->where('user_id', $unique[$x])->whereIn('interest_id', $request->interest); //user yang memiliki salah satu interest
                if($icount == count($iuser[$x])){
                    $iusers[] = $iuser[$x]; //user yang memiliki semua interest
                }
            }
        }
        foreach ($iusers as $iuser){
            foreach($iuser as $iu){
                $iuser_id[] = $iu->user_id;
            }
        }

        //PROVINCE
        if($request->province > 1){
            $provinces = $provinces->where('id', $request->province);
        }
        foreach ($provinces as $province){
            $up[] = $province->id;
        }

        //USER
        $users = User::whereHas('jobs', function($query) use($uj) {
                    $query->whereIn('job_id', $uj);
                })
                // ->whereHas('interests', function($query) use($ui) {
                //     $query->whereIn('interest_id', $ui);
                // })
                ->whereIn('gender_id', $ug)
                ->whereIn('province_id', $up)
                ->get();

        if($request->interest[0] > 1){
            $ui = array_unique($iuser_id);
            $users = $users->whereIn('id', $ui);
        }

        dd($users);

        foreach($users as $user){
            // Mail::to($user->email)->send(new Blast_New_Survey());
        }

        return redirect()->route('mail.index');
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
    public function update(Request $request, $detail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($detail)
    {
        //
    }
}
