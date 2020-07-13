<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Subject;
class SubjectsController extends Controller
{
    public function index(){
        $subjects = Subject::all();
        return view('subjects.index',compact('subjects'));
    }
    public function store(Request $request){
        $data = $this->validate($request,[
            'name'=>'required|unique:subjects'
        ]);
        Subject::create($data);
        return redirect(route('subjects.index'))->withSuccess('done!');
    }
    public function show(Subject $subject){
        $answers = $subject->answers()->latest()->get();
       
        return view('subjects.show',compact('subject','answers'));
    }
    public function destroy(Subject $subject){
        foreach($subject->answers as $answer){
            $answer->delete();
        }
        $subject->delete();
        return redirect(route('subjects.index'))->withSuccess('done!');
    }
}
