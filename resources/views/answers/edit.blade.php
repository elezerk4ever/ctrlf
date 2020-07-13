@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Edit Answer</div>
                <div class="card-body">
                <form method="POST" action="{{route('answers.update',$answer->id)}}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="editor">Question</label>
                            <textarea id="editor" class="form-control @error('question')
                                is-invalid
                        @enderror" required name="question">{{$answer->question}}</textarea>
                            @error('question')
                                {{$message}}
                            @enderror
                        </div>
                    <input type="hidden" name="subject_id" value="{{$answer->subject_id}}" required>
                        <div class="form-group">
                            <label for="answer">Answer</label>
                            <input id="answer" class="form-control @error('answer')
                                is-invalid
                            @enderror" type="text" name="answer" required value="{{$answer->answer}}">
                            @error('answer')
                                {{$message}}
                            @enderror
                        </div>
                        <input type="submit" class="btn btn-block btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="/ckeditor/ckeditor.js" defer></script>
<script src="/js/ckeditor.js" defer></script>
@endsection
