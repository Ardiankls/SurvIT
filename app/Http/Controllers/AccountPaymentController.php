<?php

namespace App\Http\Controllers;

use App\Models\account_payment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            'transfer' => $request->transfer,
            'point' => $user->point - $request->value,
        ]);

        account_payment::create([
            'user_id' => $id,
            'value' => $request->value,
            'bank' => $request->bank,
            'transfer' => $request->transfer,
        ]);

        return redirect()->route('usersurvey.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\account_payment  $account_payment
     * @return \Illuminate\Http\Response
     */
    public function show(account_payment $account_payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\account_payment  $account_payment
     * @return \Illuminate\Http\Response
     */
    public function edit(account_payment $account_payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\account_payment  $account_payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, account_payment $account_payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\account_payment  $account_payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(account_payment $account_payment)
    {
        //
    }
}
