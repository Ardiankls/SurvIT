<?php

namespace App\Http\Controllers;

use App\Models\gender;
use App\Models\interest;
use App\Models\job;

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
}
