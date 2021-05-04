<?php

namespace App\Http\Controllers;

use App\Models\gender;
use Illuminate\Http\Request;

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
        return view('surveyor.dashboard');
    }

    public function createDemo(){
        $gender = gender::all()->get('gender');
        return view('surveyor.dashboard', compact('gender'));
    }
}
