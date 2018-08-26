@extends('admin.index')
@section('content')
    <div class="container">
        @can('create', $c)
            <div class="row">
                <div class="col-md-6">
                    <form class="form-horizontal" method="POST" action="{{ route('admin.store') }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="fio">First/Last Name:</label>
                            <div class="col-sm-10">
                                <input type="text" name="fio" class="form-control" id="fio" autofocus placeholder="First/Last Name...">
                                <small>Min: 2, Max: 32, only text</small>
                                <p class="errorTitle text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="email">Email:</label>
                            <div class="col-sm-10">
                                <input type="text" name="email" class="form-control" id="email" autofocus placeholder="Email...">
                                <small>Min: 2, Max: 32, only text</small>
                                <p class="errorTitle text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="stack">Stack:</label>
                            <div class="col-sm-10">
                                <input type="text" name="stack" class="form-control" id="stack" autofocus placeholder="Stack...">
                                <small>Min: 2, Max: 32, only text</small>
                                <p class="errorTitle text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="tags">Tags:</label>
                            <div class="col-sm-10">
                                <input type="text" name="tags" class="form-control" id="tags" autofocus placeholder="Tags...">
                                <small>Min: 2, Max: 32, only text</small>
                                <p class="errorTitle text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="salary">Salary:</label>
                            <div class="col-sm-10">
                                <input type="text" name="salary" class="form-control" id="salary" autofocus placeholder="Salary...">
                                <small>Min: 2, Max: 128, only text</small>
                                <p class="errorContent text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="submit" name="add" value="Create..." class="btn btn-primary">
                        </div>
                    </form>
                </div>
                <div class="col-md-6"></div>
            </div>
        @else
            <div class="alert alert-danger">
                Access dined for you!
            </div>
        @endcan()
    </div>
@endsection()