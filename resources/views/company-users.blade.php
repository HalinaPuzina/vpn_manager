@extends('layouts.base')

@section('content')
<div class="album text-muted">
    <div class="container">
        @include('flash::message')

        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-sm-3">
                    <h1>Abusers</h1>
                </div>
            </div>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Used</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user) 
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td> {{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{formatBytes($user->used)}}</td>
                    <td></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection