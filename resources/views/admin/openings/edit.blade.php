@extends('admin.index')
@section('title', ':: '.$openings->title)
@section('content')
        @can('updateO', $openings)
            <div class="row">
                <div class="col-md-offset-2 col-md-8">
                    <!-- -->
                    <div class="card">
                        <form class="form-horizontal" method="POST" action="{{ route('admin.openings.update', $openings->id) }}" enctype="multipart/form-data">
                            <input type="hidden" name="_method" value="PUT">
                            {{csrf_field()}}
                            <div class="card-header card-header-text" data-background-color="blue">
                                <div class="card-inline-box">
                                    <i class="material-icons">mail_outline</i>
                                </div>
                                <div class="card-inline-box">
                                    <h4 class="card-title">Edit opening details</h4>
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="row">
                                    <label class="col-sm-2 label-on-left candidate-edit">Title</label>
                                    <div class="col-md-10">
                                        <div class="form-group label-floating is-empty">
                                            <label class="control-label"></label>
                                            <input class="form-control" name="title" type="text" value="{{$openings->title}}">
                                            <span class="material-input"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 label-on-left candidate-edit">Location</label>
                                    <div class="col-md-10">
                                        <div class="form-group label-floating is-empty">
                                            <label class="control-label"></label>
                                            <input class="form-control" name="location" type="text" value="{{$openings->location}}">
                                            <span class="material-input"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 label-on-left candidate-edit">Salary</label>
                                    <div class="col-md-10">
                                        <div class="form-group label-floating is-empty">
                                            <label class="control-label"></label>
                                            <input class="form-control" name="salary" type="text" value="{{$openings->salary}}">
                                            <span class="material-input"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="col-sm-2 label-on-left candidate-edit">Description</label>
                                        <div class="form-group label-floating is-empty">
                                            <div class="col-md-10">
                                                <textarea class="form-control" rows="6" name="description">{{$openings->description}}</textarea>
                                                <span class="material-input"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating is-empty">
                                            <label class="col-sm-2 label-on-left candidate-edit">
                                                Status
                                                <small>*</small>
                                            </label>
                                        <div class="col-md-10">
                                            <div class="checkbox-radios">
                                                @if(isset($openings->status) && $openings->status > 0)
                                                    <div class="radio">
                                                        <label class="op-status">
                                                            <input type="radio" name="status" value="1" checked="true">
                                                            <span class="circle"></span>
                                                            <span class="check"></span>
                                                            Active
                                                        </label>
                                                    </div>
                                                    <div class="radio">
                                                        <label class="op-status">
                                                            <input type="radio" name="status" value="0">
                                                            <span class="circle"></span>
                                                            <span class="check"></span>
                                                            Closed
                                                        </label>
                                                    </div>
                                                @else
                                                    <div class="radio">
                                                        <label>
                                                            <input type="radio" name="status" value="1">
                                                            <span class="circle"></span>
                                                            <span class="check"></span>
                                                            Active
                                                        </label>
                                                    </div>
                                                    <div class="radio">
                                                        <label>
                                                            <input type="radio" name="status" value="0" checked="true">
                                                            <span class="circle"></span>
                                                            <span class="check"></span>
                                                            Closed
                                                        </label>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <hr>
                                        <label class="label-on-left candidate-edit">Opening Poster</label>
                                    </div>
                                </div>
                                <div class="row">
                                    @if(isset($openings->img) && $openings->img !== null)
                                    <div class="col-md-6" data-info="upload_cvs">
                                        <div class="form-group">
                                            <div class="fileinput text-center fileinput-exists" data-provides="fileinput">
                                                <div class="fileinput-preview fileinput-exists thumbnail">
                                                    <img src="{{route('main')}}/images/openings/{{$openings->img}}" alt="Opening Poster">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    <div class="col-md-6">
                                        <div id="edit-upload-cvs" class="fileinput text-center fileinput-new hidden" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail">
                                                <img src="/dashboard/assets/img/placeholder.jpg" style="width:80px;" alt="Upload File">
                                            </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail" style=" padding: 10px 15px;"></div>
                                            <div>
                                                    <span class="btn btn-rose btn-round btn-file">
                                                        <span class="fileinput-new">Select image</span>
                                                        <span class="fileinput-exists">Change</span>
                                                        <input type="hidden" value="" name="editImgFile">
                                                        <input type="file" name="editImgFile" id="editImgFile">
                                                        <div class="ripple-container"></div>
                                                    </span>
                                                <a href="#" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove<div class="ripple-container"><div class="ripple ripple-on ripple-out" style="left: 48.5781px; top: 21.4531px; background-color: rgb(255, 255, 255); transform: scale(15.5489);"></div><div class="ripple ripple-on ripple-out" style="left: 26.75px; top: 18px; background-color: rgb(255, 255, 255); transform: scale(15.5489);"></div></div></a>
                                            </div>
                                        </div>
                                        <div class="form-group opening-edit-tbs">
                                            <button type="button" rel="tooltip" class="btn btn-warning pull-left" data-original-title="Edit">
                                                <i class="material-icons">edit</i>
                                                <div class="ripple-container"></div>
                                            </button>
                                            <!--
                                            <button rel="tooltip" class="btn btn-danger pull-left" data-original-title="Remove" value="false" name="delete_cvs" style="display: @if(isset($openings->img) && $openings->img !== null) block @else none @endif">
                                                <i class="material-icons">close</i>
                                                <div class="ripple-container"></div>
                                            </button>
                                            -->
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <a href="{{route('admin.openings')}}" class="btn btn-default pull-left">Back</a>
                                        <div class="form-footer text-right">
                                            <button name="add" type="submit" class="btn btn-success btn-fill">Update...</button>
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
                You don't have permission's for this operation!
            </div>
        @endcan()
@endsection()