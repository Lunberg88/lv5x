@extends('layouts.app')
@section('content')
    <div class="container">
        @can('update', $c)
        <div class="row">
                 {!! Form::model($c, ['route' => ['admin.update', $c->id], 'method' => 'PUT']) !!}
                {{ csrf_field() }}
                <div class="form-group">
                    <label class="control-label col-sm-2" for="fio">First/Last Name:</label>
                    <div class="col-sm-10">
                        <input type="text" name="fio" class="form-control" id="fio" autofocus value="{{$c->fio}}">
                        <small>Min: 2, Max: 32, only text</small>
                        <p class="errorTitle text-center alert alert-danger hidden"></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="email">Email:</label>
                    <div class="col-sm-10">
                        <input type="text" name="email" class="form-control" id="email" autofocus value="{{$c->email}}">
                        <small>Min: 2, Max: 32, only text</small>
                        <p class="errorTitle text-center alert alert-danger hidden"></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="stack">Stack:</label>
                    <div class="col-sm-10">
                        <input type="text" name="stack" class="form-control" id="stack" autofocus value="{{$c->stack}}">
                        <small>Min: 2, Max: 32, only text</small>
                        <p class="errorTitle text-center alert alert-danger hidden"></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="tags">Tags:</label>
                    <div class="col-sm-10">
                        <input type="text" name="tags" class="form-control" id="tags" autofocus value="{{$c->tags}}">
                        <small>Min: 2, Max: 32, only text</small>
                        <p class="errorTitle text-center alert alert-danger hidden"></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="salary">Salary:</label>
                    <div class="col-sm-10">
                        <input type="text" name="salary" class="form-control" id="salary" autofocus value="{{$c->salary}}">
                        <small>Min: 2, Max: 128, only text</small>
                        <p class="errorContent text-center alert alert-danger hidden"></p>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" name="add" value="Update" class="btn btn-primary">
                </div>
                {!! Form::close() !!}
        </div>
        @else
            <div class="alert alert-danger">
                You don't have permission's for this operation!
            </div>
        @endcan()
    </div>
@endsection()