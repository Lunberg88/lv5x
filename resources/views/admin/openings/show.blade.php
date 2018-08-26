@extends('admin.index')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if($openings)
                    <div class="row">
                        <div class="group-control">Title: <b>{{$openings->title}}</b></div>
                        <div class="group-control">Location: <b>{{$openings->location}}</b></div>
                        <div class="group-control">Salary: <b>{{$openings->salary}}</b></div>
                        <div class="group-control">Description: {{$openings->description}}</div>
                        <div class="group-control">Status: <b>{{$openings->status}}</b></div>
                        <br />
                    </div>
                @else
                    <div class="alert alert-danger">
                        No Opening found with this ID.
                    </div>
                @endif()
            </div>
        </div>
    </div>
@endsection()

