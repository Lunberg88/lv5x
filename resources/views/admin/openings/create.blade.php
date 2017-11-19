@extends('admin.index')
@section('content')
    <div class="container">
        @can('createO', $openings)
            <div class="row">
                <div class="col-md-6">
                    <form class="form-horizontal" method="POST" action="{{ route('admin.openings.store') }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="title">Opening Title:</label>
                            <div class="col-sm-10">
                                <input type="text" name="title" class="form-control" id="title" autofocus placeholder="Title...">
                                <small>Min: 10, Max: 100, only text</small>
                                <p class="errorTitle text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="location">Location:</label>
                            <div class="col-sm-10">
                                <input type="text" name="location" class="form-control" id="location" autofocus placeholder="Location...">
                                <small>Min: 10, Max: 50, only text</small>
                                <p class="errorTitle text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="salary">Salary:</label>
                            <div class="col-sm-10">
                                <input type="text" name="salary" class="form-control" id="salary" autofocus placeholder="Salary...">
                                <small>Min: 3, Max: 5, only digits</small>
                                <p class="errorTitle text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="description">Description:</label>
                            <div class="col-sm-10">
                                <input type="text" name="description" class="form-control" id="description" autofocus placeholder="Description...">
                                <small>Min: 5, Max: 255, only text</small>
                                <p class="errorTitle text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="status">Status:</label>
                            <div class="col-sm-10">
                                <input type="text" name="status" class="form-control" id="status" autofocus placeholder="Status...">
                                <small>Select status-type</small>
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