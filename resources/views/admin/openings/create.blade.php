@extends('admin.index')
@section('title', ':: Create Opening')
@section('content')
        @can('createO', $openings)
            <div class="row">
                <div class="col-md-offset-1 col-md-10">
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
                                            <input class="form-control" name="location">
                                            <span class="material-input"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group label-floating is-empty">
                                            <div class="col-md-8 col-sm-8">
                                                <label class="control-label">
                                                    Salary
                                                    <small>*</small>
                                                </label>
                                                <input class="form-control" name="salary" type="text">
                                                <span class="material-input"></span>
                                            </div>
                                            <div class="col-md-4 col-sm-4">
                                                <select name="currency" class="form-control">
                                                    <option value="1">&dollar;</option>
                                                    <option value="2">&euro;</option>
                                                    <option value="3">&#8381;</option>
                                                    <option value="4">&#8372;</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group label-floating is-empty col-md-8">
                                            <div class="input-group">
                                                <label class="control-label">
                                                    Rate <small>*</small>
                                                </label>
                                                <input type="text" name="rate" class="form-control">
                                                <span class="material-input"></span>
                                                <span class="input-group-addon">&dollar;</span>
                                            </div>
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
                                            <textarea class="form-control blog-field" rows="6" name="description"></textarea>
                                            <span class="material-input"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <hr>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group is-empty">
                                            <label class="control-label">
                                                Status
                                                <small>*</small>
                                            </label>
                                            <div class="checkbox-radios">
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="status" value="1" checked="true"><span class="circle"></span><span class="check"></span>Active
                                                    </label>
                                                </div>
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="status" value="0"><span class="circle"></span><span class="check"></span>Closed
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group is-empty">
                                            <label class="control-label">
                                                Type <small>*</small>
                                            </label>
                                            <div class="checkbox-radios">
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="type" value="0" checked="true"><span class="circle"></span><span class="check"></span>Remote
                                                    </label>
                                                </div>
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="type" value="1"><span class="circle"></span><span class="check"></span>Relocate
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <hr>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="fileinput text-center fileinput-new" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail">
                                                <img src="/dashboard/assets/img/placeholder.jpg" style="width:80px;" alt="Upload File">
                                            </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail" style=" padding: 10px 15px;"></div>
                                            <div>
                                                    <span class="btn btn-rose btn-round btn-file">
                                                        <span class="fileinput-new">Select image</span>
                                                        <span class="fileinput-exists">Change</span>
                                                        <input type="hidden" value="" name="imgFile">
                                                        <input type="file" name="imgFile" id="imgFile">
                                                        <div class="ripple-container"></div>
                                                    </span>
                                                <a href="#" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove<div class="ripple-container"><div class="ripple ripple-on ripple-out" style="left: 48.5781px; top: 21.4531px; background-color: rgb(255, 255, 255); transform: scale(15.5489);"></div><div class="ripple ripple-on ripple-out" style="left: 26.75px; top: 18px; background-color: rgb(255, 255, 255); transform: scale(15.5489);"></div></div></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <a href="{{route('admin.openings')}}" class="btn btn-default pull-left">Back</a>
                                        <div class="form-footer text-right">
                                            <button name="add" type="submit" class="btn btn-success btn-fill">Create...</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- //-->
                </div>
            </div>
        @else
            <div class="alert alert-danger">
                Access dined for you!
            </div>
        @endcan()
@endsection()