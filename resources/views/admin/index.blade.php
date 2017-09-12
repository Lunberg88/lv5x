@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @if(session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif()
            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif()
        </div>
        <div class="row">
            <h2><b>List Of Candidate's...</b></h2>
        </div>
        <div class="row">
            <table class="table table-stripped">
                <thead>
                    <th>Id</th>
                    <th>Fio</th>
                    <th>Email</th>
                    <th>Stack</th>
                    <th>Tags</th>
                    <th>Salary</th>
                    <th>Actions</th>
                </thead>
                <tbody>
                    @foreach($c as $p)
                    <tr>
                        <td>{{$p->id}}</td>
                        <td>{{$p->fio}}</td>
                        <td>{{$p->email}}</td>
                        <td>{{$p->stack}}</td>
                        <td>{{$p->tags}}</td>
                        <td>{{$p->salary}}</td>
                        <td><a href="{{route('admin.edit', $p->id)}}" class="btn btn-danger">EDIT</a></td>
                    </tr>
                    @endforeach()
                </tbody>
            </table>
        </div>
    </div>
@endsection()