<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\gender;
use App\Models\interest;
use App\Models\job;
use App\Models\User;
use App\Models\userinterest;
use App\Models\userjob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $genders = gender::all();
        $jobs = job::all();
        $interests = interest::all();

        return view('surveyor.dashboard', compact('genders', 'jobs', 'interests'));
    }


    public function store(Request $request, User $user)
    {
        $user->update([
            'gender_id' => $request->gender
        ]);

        $user->update([
            'gender_id' => $request->gender
        ]);

        $user->update([
            'gender_id' => $request->gender
        ]);

        return redirect()->route('home');
    }
}
