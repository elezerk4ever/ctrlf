<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class LiveSearchController extends Controller
{
    public function action(Request $request){
        $data = [];
        if($request->ajax())
        {
        $query = $request->get('query');
        if($query != '')
        {
        $data = \App\Answer::
            where('question', 'like', '%'.$query.'%')
            ->orWhere('answer', 'like', '%'.$query.'%')
            ->get();
        }
        foreach($data as $dat){
            $dat['user'] = $dat->user->name;
        }
       
    }
    return json_encode($data);
    }
}
