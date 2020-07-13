<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchsController extends Controller
{
    public function findAnswer(Request $request){
        return $request->query('token');
    }
}
