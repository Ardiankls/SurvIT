<?php

namespace App\Http\Controllers;

use App\Models\account_payment;
use App\Models\point_log;
use App\Models\user_campaign;
use App\Models\user_survey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PointLogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $usurveys = user_survey::all()->where('user_id', $user->id);
        $payments = account_payment::all()->where('user_id', $user->id);
        $campaigns = user_campaign::all()->where('user_id', $user->id);

        $uid = [];
        foreach($usurveys as $usurvey){
            $uid[] = $usurvey->id;
        }

        $pid = [];
        foreach($payments as $payment){
            $pid[] = $payment->id;
        }

        $cid = [];
        foreach($campaigns as $campaign){
            $cid[] = $campaign->id;
        }

        $pointlogs = point_log::whereIn('user_survey_id', $uid)
                            ->orWhereIn('account_payment_id', $pid)
                            ->orWhereIn('user_campaign_id', $cid)
                            ->orderBy('id', 'DESC')
                            ->get();

        //Point dalam proses
        $upoint = 0;
        $pendings = point_log::where(function ($query) use($uid){
                                $query->whereIn('user_survey_id', $uid)
                                    ->where('status_id', 2);
                            })
                            ->orWhere(function ($query) use($pid){
                                $query->whereIn('account_payment_id', $pid)
                                    ->where('status_id', 2);
                            })
                            ->get();

        foreach($pendings as $pending){
            $upoint += $pending->point;
        }

        return view('pointlog', compact('pointlogs', 'user', 'upoint'));
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
     * @param  \App\Models\point_log  $point_log
     * @return \Illuminate\Http\Response
     */
    public function show(point_log $point_log)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\point_log  $point_log
     * @return \Illuminate\Http\Response
     */
    public function edit(point_log $point_log)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\point_log  $point_log
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, point_log $point_log)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\point_log  $point_log
     * @return \Illuminate\Http\Response
     */
    public function destroy(point_log $point_log)
    {
        //
    }
}
