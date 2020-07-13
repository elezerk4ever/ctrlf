@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
            <div class="card-header">{{$student->name}} - < {{$student->email}} ></div>
                <div class="card-body">
                    <div>
                        {{$student->answers()->count()}} Answer(s)
                    </div>
                </div>
            </div>
            @if ($student->answers()->count())
            @foreach ($student->answers()->latest()->get() as $answer)
                <div class="card card-body mt-2">
                <div><strong>Question : </strong>{!! $answer->question !!}</div>
                <div><strong>Answer : </strong>{{ $answer->answer }}</div>
                </div>
            @endforeach
            @endif
        </div>
    </div>
</div>
@endsection
