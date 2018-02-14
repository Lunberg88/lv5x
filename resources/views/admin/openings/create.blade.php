@extends('admin.index')
@section('content')
        @can('createO', $openings)
            <div class="row">
                <div class="col-md-offset-2 col-md-8">
                    <!-- -->
                    <div class="card">
                        <form class="form-horizontal" method="POST" action="{{ route('admin.openings.store') }}" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="card-header card-header-text" data-background-color="blue">
                                <div class="card-inline-box">
                                    <i class="material-icons">mail_outline</i>
                                </div>
                                <div class="card-inline-box">
                                    <h4 class="card-title">Add new opening</h4>
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating is-empty">
                                            <label class="control-label">
                                                Title
                                                <small>*</small>
                                            </label>
                                            <input class="form-control" name="title" type="text" required="true" aria-required="true">
                                            <span class="material-input"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating is-empty">
                                            <label class="control-label">
                                                Location
                                                <small>*</small>
                                            </label>
                                            <input class="form-control" name="location" type="text" required="true" aria-required="true">
                                            <span class="material-input"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating is-empty">
                                            <label class="control-label">
                                                Salary
                                                <small>*</small>
                                            </label>
                                            <input class="form-control" name="salary" type="text" required="true" aria-required="true">
                                            <span class="material-input"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating is-empty">
                                            <label class="control-label">
                                                Description
                                                <small>*</small>
                                            </label>
                                            <textarea class="form-control" rows="6" name="description" required="true" aria-required="true"></textarea>
                                            <span class="material-input"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating is-empty">
                                            <label class="control-label">
                                                Status
                                                <small>*</small>
                                            </label>
                                            <input class="form-control" name="status" type="text" required="true" aria-required="true">
                                            <span class="material-input"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div>
                                            <span class="btn btn-rose btn-round btn-file">
                                                <span class="fileinput-new">Select image</span>
                                                <span class="fileinput-exists">Change</span>
                                                <input type="file" name="imgFile" id="imgFile">
                                                <div class="ripple-container"></div>
                                            </span>
                                            <a href="#pablo" class="btn btn-info btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                        </div>
                                        <!--
                                        <div class="form-group label-floating is-empty">
                                            <label class="control-label">
                                                Image
                                                <small>*</small>
                                            </label>
                                            <input class="form-control" name="imgFile" id="imgFile" type="file" required="true" aria-required="true">
                                            <span class="material-input"></span>
                                        </div>
                                        -->
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-footer text-right">
                                            <button name="add" type="submit" class="btn btn-success btn-fill">Create...</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- //-->
                    {{--
                    <form class="form-horizontal" method="POST" action="{{ route('admin.openings.store') }}" enctype="multipart/form-data">
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
                        <div class="form-group">
                            <label for="imgFile" class="control-label col-sm-2">Image poster:</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" id="imgFile" name="imgFile">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="submit" name="add" value="Create..." class="btn btn-primary">
                        </div>
                    </form>
                    --}}
                </div>
                <div class="col-md-6"></div>
            </div>
        @else
            <div class="alert alert-danger">
                Access dined for you!
            </div>
        @endcan()
@endsection()