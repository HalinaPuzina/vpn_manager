@extends('layouts.base')

@section('content')
<div class="album text-muted">
    <div class="container">
        @include('flash::message')
        <h1>Company</h1>
        {!! Form::open(['url' => route('create-company'),'method' => 'post']) !!}
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="Name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="" value="" required="">
                    <div class="invalid-feedback">
                        {{$errors->first('name')}}
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="qouta">Quota</label>
                    <input type="text" class="form-control" id="qouta" name="qouta" placeholder="" value="" required="">
                    <div class="invalid-feedback">
                        {{$errors->first('qouta')}}
                    </div>
                </div>
                <button type="submit">Save</button>
        {!! Form::close() !!}
    </div>
</div>
@endsection