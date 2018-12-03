@extends('layouts.base')

@section('content')
<div class="album text-muted">
    <div class="container">
        @include('flash::message')
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-sm-3">
                    <h1>Users</h1>
                </div>
                <div class="col-sm-3">
                    <a href="{{route('user-new')}}" class="btn btn-primary">Add</a>
                </div>

            </div>
        </div>


        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Company</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user) 
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td> {{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->company->name}}</td>
                    <td><a href="{{route('user-edit',$user->id)}}">Edit</a></td>
                    <td><a href="{{route('delete-user',$user->id)}}">Delete</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="text-center">{{ $users->links() }}</div>
    </div>
</div>
@endsection