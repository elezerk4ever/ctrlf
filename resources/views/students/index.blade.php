@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Accounts</div>
                <div class="card-body">
                <form action="{{route('students.store')}}" method="POST">
                        @csrf
                         <div class="form-group">
                             <label for="name">Name</label>
                             <input id="name" class="form-control @error('name')
                                 is-invalid
                             @enderror" type="text" name="name">
                             @error('name')
                                 <small class="text-danger">
                                     {{$message}}
                                 </small>
                             @enderror
                         </div>
                         <div class="form-group">
                            <label for="email">Email</label>
                            <input id="email" class="form-control @error('name')
                            is-invalid
                        @enderror" type="email" name="email">
                            @error('email')
                                 <small class="text-danger">
                                     {{$message}}
                                 </small>
                             @enderror
                        </div>
                        <div class="form-group">
                            <label for="passowrd">Password</label>
                            <input id="passowrd" class="form-control @error('name')
                            is-invalid
                        @enderror" type="password" name="password">
                            @error('password')
                            <small class="text-danger">
                                {{$message}}
                            </small>
                            @enderror
                        </div>
                        <input type="submit" class="btn btn-primary btn-block">
                     </form>

                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Records
                </div>
                <div class="card-body">
                    <table class="table table-sm table-bordered">
                        <tbody>
                            <tr>
                                <th>
                                    No.
                                </th>
                                <th>
                                    Name
                                </th>
                                <th>
                                    Email
                                </th>
                                <th>
                                    Delete
                                </th>
                            </tr>
                            @forelse ($students as $key=>$student)
                                <tr>
                                    <td>
                                        {{$key+1}}
                                    </td>
                                    <td>
                                    <a href="{{route('students.show',$student->id)}}">{{$student->name}}</a>
                                    </td>
                                    <td>
                                        {{$student->email}}
                                    </td>
                                    <td>
                                    <form action="{{route('students.destroy',$student->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" class="btn btn-sm" value="[x]">
                                    </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">
                                        No Account Available
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
