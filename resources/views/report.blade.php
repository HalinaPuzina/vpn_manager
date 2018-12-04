@extends('layouts.base')

@section('content')
<div class="album text-muted">
    <div class="container">
        <div class="container">
            <div class="row justify-content-md-center">
                <h1> Abusers</h1>
            </div>
            <div class="row justify-content-md-center">
                <div class="col-md-2">
                    <a href="{{route('generate')}}" class="btn btn-primary">Generate data</a>
                </div>
                <div class="col-md-2">

                </div>

            </div>
            {!! Form::open(['url' => route('report-list'),'method' => 'get']) !!}
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <strong>Date : </strong>
                    <input name="date" class="date form-control" required type="text" id="datepicker" name="date">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <button class="btn btn-primary" type="submit">Report</button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
        <div class="container">
            @if(count($companies))
            <div class="row"><h1>Report for {{request()->input('date')}}</h1></div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Used</th>
                        <th scope="col">Quota</th>
                        <th scope="col">Users</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($companies as $company)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td> {{$company->name}}</td>
                        <td>{{formatBytes($company->used)}}</td>
                        <td>{{formatBytes($company->qouta)}}</td>
                        <td><a href="{{url('companies-users/'.$company->id.'?date='.request()->input('date'))}}">See More</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script type="text/javascript">
    $('#datepicker').datepicker({
        autoclose: true,
        format: 'yyyy-mm'
    });

</script>
@endpush
