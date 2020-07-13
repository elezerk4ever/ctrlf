<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public function store(\App\Answer $answer){
        $res = auth()->user()->reporting()->toggle($answer);
        // return redirect(route('answers.index').'#answer-'.$answer->id);
        return $res;
    }
}
