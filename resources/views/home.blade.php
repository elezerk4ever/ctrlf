@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Account Details</div>
                <div class="card-body">
                    <div>Name: {{auth()->user()->name}}</div>
                    <div>Email: {{auth()->user()->email}}</div>
                <div>{{auth()->user()->answers()->count()}} Answer(s)</div>
                </div>
            </div>

            <div class="card mt-2">
                <div class="card-header">Add new Answer</div>
                <div class="card-body">
                <form method="POST" action="{{route('answers.store')}}">
                        @csrf
                        <div class="form-group">
                            <label for="editor">Question</label>
                            <textarea id="editor" class="editor form-control @error('question')
                                is-invalid
                            @enderror" required name="question"></textarea>
                            @error('question')
                                {{$message}}
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="subject">Subject</label>
                            <select id="subject" class="form-control" name="subject_id" required>
                                @forelse ($subjects as $subject)
                                <option value="{{$subject->id}}">{{$subject->name}}</option>
                                @empty
                                <option value="" disabled>No Subject Found...</option>
                                @endforelse
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="answer">Answer</label>
                            <input id="answer" class="form-control @error('answer')
                                is-invalid
                            @enderror" type="text" name="answer" required>
                            @error('answer')
                                {{$message}}
                            @enderror
                        </div>
                        <input type="submit" class="btn btn-block btn-primary">
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    5 Latest Submission
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @forelse (auth()->user()->answers()->latest()->take(5)->get() as $answer)
                            <li class="list-group-item d-flex justify-content-between">
                                <div class="truncate">
                                    <strong>Answer : </strong> {{$answer->answer}}
                                </div>
                                <div>
                                <a href="{{route('answers.edit',$answer->id)}}" >[ view and edit ]</a>
                                </div>
                            </li>
                        @empty
                            <li class="list-group-item">
                                No Answer Available
                            </li>
                        @endforelse
                    </ul>
                </div>
            </div>
           
        </div>
    </div>
</div>
<script src="/ckeditor/ckeditor.js" defer></script>
<script src="/js/ckeditor.js" defer></script>
@endsection
