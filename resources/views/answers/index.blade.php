@extends('layouts.app')

@section('content')
<div class="container">
    @include('search')
    <div class="row justify-content-center">
        <div class="col-md-12">
           
            
            <div class="content">
                @forelse ($answers as $answer)
            <div class="card mb-2" id="answer-{{$answer->id}}">
                        <div class="card-header d-flex justify-content-between">
                            <div>
                                {{$answer->user->name}}
                            </div>
                            <div>
                                {{$answer->created_at->diffForHumans()}}
                            </div>
                        </div>
                        <div class="card-body">
                            <div>
                                <strong>Subject Name:</strong> {{$answer->subject->name}}
                            </div>
                            <div>
                                <strong>Question : </strong>
                                {!!$answer->question!!}
                            </div>
                            <div class="bg-success p-2 text-white">
                                <strong>
                                    Answer : 
                                </strong>
                                {{$answer->answer}}
                            </div>
                            <div class="text-right">
                            @can('update',\App\Answer::find($answer->id))
                                <a href="{{route('answers.edit',$answer->id)}}">[ Edit ]</a>
                            @endcan
                            @can('delete', \App\Answer::find($answer->id))
                                <a href="#" class="text-danger" onclick="fdelete{{$answer->id}}.submit()">[ Delete ]</a>
                            @endcan
                            <a type="button" id="report{{$answer->id}}" class="text-secondary {{$answer->reporters()->find(auth()->user()->id) ? 'text-success':''}}" onclick="reportSubmit({{$answer->id}})">[ Report as wrong ]</a>
                            {{-- <form action="{{route('reports.store',$answer)}}" method="POST" id="freport{{$answer->id}}">
                                @csrf
                            </form> --}}
                            <form action="{{route('answers.destroy',$answer->id)}}" method="POST" id="fdelete{{$answer->id}}">
                                @csrf
                                @method('DELETE')
                            </form>
                            </div>
                        </div>
                        <div class="card-footer">
                            <span id="repcount{{$answer->id}}">{{$answer->reporters()->count()}}</span> reported(s) as Wrong
                        </div>
                    </div>
                @empty
                    <h4 class="mt-5">
                        No Answer available
                    </h4>
                @endforelse
            </div>
            <div class="header">
                <div class="d-flex container mt-2">
                    <input type="search" placeholder="page search here..." class="form-control">
                    <button data-search="next" class="btn btn-success btn-sm ml-2">&darr;</button>
                    <button data-search="prev" class="btn btn-success btn-sm ml-2">&uarr;</button>
                    <button data-search="clear" class="btn btn-success btn-sm ml-2">✖</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="/js/reportSubmit.js" defer></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/mark.js/8.11.1/jquery.mark.min.js" defer></script>
<script src="/js/mark.js" defer></script>
@endsection
