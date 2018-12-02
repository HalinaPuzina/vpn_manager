@extends('layouts.base')

@section('content')
<div class="album text-muted">
    <div class="container">
        @include('flash::message')
        <h1>User</h1>
        {!! Form::open(['url' => route('update-user',$user->id),'method' => 'put']) !!}
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="Name">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="" value="{{$user->name ?? null}}" required="">
                <div class="invalid-feedback">
                    {{$errors->first('name')}}
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <label for="qouta">E-mail</label>
                <input type="text" class="form-control" id="qouta" name="email" placeholder="" value="{{$user->email?? null}}" required="">
                <div class="invalid-feedback">
                    {{$errors->first('email')}}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5 mb-3">
                <label for="country">Company</label>
                <select class="custom-select d-block w-100" name="company_id" id="country" required="">
                    <option value="">Choose...</option>
                    @foreach($companies as $company)
                    <option value="{{$company->id}}" {{ $company->id == $user->company_id ? 'selected' : null}}>{{$company->name}}</option>
                    @endforeach
                </select>
                <div class="invalid-feedback">
                    {{$errors->first('company_id')}}
                </div>
            </div>

        </div>
        <button type="submit">Save</button>
        {!! Form::close() !!}
    </div>
</div>
@endsection