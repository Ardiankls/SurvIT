<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\survey;

class FillController extends Controller
{
    public function fill($id){
        $survey = survey::Find($id);
        return view('surveyor.survey', compact('survey'));
    }
}
