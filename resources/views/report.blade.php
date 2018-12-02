@extends('layouts.base')

@section('content')
<div class="album text-muted">
    <div class="container">

        <div class="row">
            <h1>Abusers</h1>
            <p>
                <a href="{{route('companies-list')}}" class="btn btn-primary">Generate data</a>
                <a href="{{route('users-list')}}" class="btn btn-secondary">Users</a>
            </p>

        </div>
    </div>
</div>
@endsection