@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @can('create', \App\Subject::class)
            <div class="col-md-4 mb-2">
                <div class="card">
                    <div class="card-header">
                        Add new Subject
                    </div>
                    <div class="card-body">
                    <form action="{{route('subjects.store')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Subject name</label>
                                <input id="name" class="form-control" type="text" name="name">
                            </div>
                            <button class="btn btn-block btn-primary" type="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        @endcan
        <div class="col">
            <div class="card">
                <div class="card-header">
                    Subjects
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @forelse ($subjects as $subject)
                            <li class="list-group-item d-flex justify-content-between">
                                <span>
                                    {{$subject->name}}
                                </span>
                                <div>
                                <a href="{{route('subjects.show',$subject->id)}}" class="text-success">[ view answers]</a>
                                @can('delete', $subject)
                                    <a  class="text-danger" style="cursor:pointer"onclick="subdel{{$subject->id}}.submit()">[ remove ]</a>
                                    <form action="{{route('subjects.destroy',$subject->id)}}" id="subdel{{$subject->id}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                @endcan
                                </div>
                            </li>
                        @empty
                            <li class="list-group-item">
                                No subject available
                            </li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
    
</div>

@endsection
