@extends('admin.index')
@section('content')
    <div class="main-dashboard">
        <div class="row">
            @if(session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
        </div>
        <div class="row">
            <div class="col-lg-10">
                {!! Form::open(['method' => 'GET', 'route' => ['search']]) !!}
                {{csrf_field()}}
                <div class="input-group">
                    <input name="search" type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button"><b>Go!</b></button>
                      </span>
                    <select class="form-control" name="stags">
                        <option disabled="disabled" selected="selected">Choose stack</option>
                        @if($tg)
                            @foreach($tg as $t)
                                <option>{{$t}}</option>
                            @endforeach
                        @endif
                    </select>
                </div><!-- /input-group -->
                {!! Form::close() !!}
            </div><!-- /.col-lg-6 -->
        </div>
        <div class="row">
            <h2><b>List of Candidate's...</b></h2>
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
                    @include('admin.grid_tb')
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="test">
        @foreach($user->roles as $role)
          <b>Role is:</b> - <i>{{$role->name}}</i>
        @endforeach
    </div>
@endsection