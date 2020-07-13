<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnswersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $answers = \App\Answer::latest()->get();
        
        return view('answers.index',compact('answers'));
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
        $data  = $this->validate($request,[
            'question'=>'required|unique:answers',
            'answer'=>'required',
            'subject_id'=>'required'
        ]);
        auth()->user()->answers()->create($data);
        return back()->withSuccess('Done!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $answer = \App\Answer::find($id);
        return view('answers.edit',compact('answer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->authorize('update',\App\Answer::find($id));
        $data  = $this->validate($request,[
            'question'=>'required|unique:answers',
            'answer'=>'required',
            'subject_id'=>'required'
        ]);

        \App\Answer::find($id)->update($data);
        return redirect(route('answers.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('delete',\App\Answer::find($id));
        \App\Answer::find($id)->delete();
        return redirect(route('answers.index'));
    }
}
