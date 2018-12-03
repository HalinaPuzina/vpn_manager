@extends('layouts.base')

@section('content')
<div class="album text-muted">
    <div class="container">
        @include('flash::message')

        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-sm-3">
                    <h1>Companies</h1>
                </div>
                <div class="col-sm-3">
                    <a href="{{route('company-new')}}" class="btn btn-primary">Add</a>
                </div>

            </div>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Quota</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($companies as $company) 
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td> {{$company->name}}</td>
                    <td>{{$company->qouta}}</td>
                    <td><a href="{{route('company-edit',$company->id)}}">Edit</a></td>
                    <td><a href="{{route('delete-company',$company->id)}}">Delete</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="text-center">{{ $companies->links() }}</div>
    </div>
</div>
@endsection