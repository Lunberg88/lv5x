@extends('admin.index')
@section('content')
    <div class="container">
        @can('update', $candidate)
            <div class="row">
                <div class="col-md-6">
                    {!! Form::model($candidate, ['route' => ['admin.candidates.update', $candidate->id], 'method' => 'PUT']) !!}
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="fio">First/Last Name:</label>
                        <div class="col-sm-10">
                            <input type="text" name="fio" class="form-control" id="fio" autofocus value="{{$candidate->fio}}">
                            <small>Min: 2, Max: 32, only text</small>
                            <p class="errorTitle text-center alert alert-danger hidden"></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email">Email:</label>
                        <div class="col-sm-10">
                            <input type="text" name="email" class="form-control" id="email" autofocus value="{{$candidate->email}}">
                            <small>Min: 2, Max: 32, only text</small>
                            <p class="errorTitle text-center alert alert-danger hidden"></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="stack">Stack:</label>
                        <div class="col-sm-10">
                            <input type="text" name="stack" class="form-control" id="stack" autofocus value="{{$candidate->stack}}">
                            <small>Min: 2, Max: 32, only text</small>
                            <p class="errorTitle text-center alert alert-danger hidden"></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="tags">Tags:</label>
                        <div class="col-sm-10">
                            <input type="text" name="tags" class="form-control" id="tags" autofocus value="{{$candidate->tags}}">
                            <small>Min: 2, Max: 32, only text</small>
                            <p class="errorTitle text-center alert alert-danger hidden"></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="salary">Salary:</label>
                        <div class="col-sm-10">
                            <input type="text" name="salary" class="form-control" id="salary" autofocus value="{{$candidate->salary}}">
                            <small>Min: 2, Max: 128, only text</small>
                            <p class="errorContent text-center alert alert-danger hidden"></p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" name="add" value="Update" class="btn btn-primary">
                    </div>
                    {!! Form::close() !!}
                </div>
                <div class="col-md-6"></div>
            </div>
        @else
            <div class="alert alert-danger">
                You don't have permission's for this operation!
            </div>
        @endcan()
    </div>
@endsection()