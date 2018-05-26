@extends('admin.index')
@section('title', ':: Add new candidate')
@section('content')
        @can('create', $candidate)
            <div class="row">
                <div class="col-md-offset-2 col-md-8">
                    <!-- -->
                    <div class="card">
                        <div class="card-header card-header-icon" data-background-color="blue">
                            <div class="card-inline-box">
                                <i class="material-icons">person_add</i>
                            </div>
                            <div class="card-inline-box">
                                <h4 class="card-title">Add new candidate</h4>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="row"><div class="col-md-12"><br></div></div>
                            <div class="row">
                                <div class="col-md-12">
                                    <form class="form-horizontal" method="POST" action="{{ route('admin.candidates.store') }}" novalidate="novalidate" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="form-group label-floating is-empty">
                                            <label class="control-label">
                                                Name
                                                <small>*</small>
                                            </label>
                                            <input class="form-control" name="fio" type="text" required="true" aria-required="true">
                                            <span class="material-input"></span>
                                        </div>
                                        <div class="form-group label-floating is-empty">
                                            <label class="control-label">
                                                Email
                                                <small>*</small>
                                            </label>
                                            <input class="form-control" name="email" id="email" type="email" required="true" aria-required="true">
                                            <span class="material-input"></span>
                                        </div>
                                        <div class="form-group label-floating is-empty">
                                            <label class="control-label">
                                                Shared CV Link
                                                <small>* Optional</small>
                                            </label>
                                            <input class="form-control" name="cvs" type="text">
                                            <span class="material-input"></span>
                                        </div>
                                        <div class="form-group label-floating is-empty">
                                            <label class="control-label">
                                                <small>Upload CV from storage</small>
                                                <small>* Optional</small>
                                            </label><br/>
                                            <div class="fileinput text-center fileinput-new" data-provides="fileinput">
                                                <div class="fileinput-new thumbnail">
                                                    <img src="/dashboard/assets/img/placeholder.jpg" style="width:80px;" alt="Upload File">
                                                </div>
                                                <div class="fileinput-preview fileinput-exists thumbnail" style=" padding: 10px 15px;"></div>
                                                <div>
                                                    <span class="btn btn-rose btn-round btn-file">
                                                        <span class="fileinput-new">Select image</span>
                                                        <span class="fileinput-exists">Change</span>
                                                        <input type="hidden" value="" name="upload_cvs">
                                                        <input type="file" name="upload_cvs" id="upload_cvs">
                                                        <div class="ripple-container"></div>
                                                    </span>
                                                    <a href="#" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove<div class="ripple-container"><div class="ripple ripple-on ripple-out" style="left: 48.5781px; top: 21.4531px; background-color: rgb(255, 255, 255); transform: scale(15.5489);"></div><div class="ripple ripple-on ripple-out" style="left: 26.75px; top: 18px; background-color: rgb(255, 255, 255); transform: scale(15.5489);"></div></div></a>
                                                </div>
                                            </div>
                                            <span class="material-input"></span>
                                        </div>
                                        <div class="form-group label-floating is-empty">
                                            <select class="form-control" name="stack">
                                                <option disabled="disabled" selected="selected">Choose stack</option>
                                                @if($stacks)
                                                    @foreach($stacks as $i => $stack)
                                                        <option value="{{$i + 1}}">{{$stack}}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                        <div class="form-group label-floating is-empty">
                                            <label class="control-label">
                                                Skills
                                                <small>*</small>
                                            </label>
                                            <div class="col-md-10">
                                                <div class="bootstrap-tagsinput">
                                                    <input type="text" placeholder="" size="1">
                                                </div>
                                                <input type="text" name="tags" class="tagsinput" data-role="tagsinput" data-color="rose" style="display: none;" placeholder="tags...">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <hr>
                                        </div>
                                        <div class="row">
                                            <div class="form-group label-floating is-empty col-md-6">
                                                <div class="col-md-9">
                                                    <label class="control-label">
                                                        Salary
                                                        <small>*</small>
                                                    </label>
                                                    <input class="form-control" name="salary" type="text">
                                                    <span class="material-input"></span>
                                                </div>
                                                <div class="col-md-3">
                                                    <select name="currency" class="form-control">
                                                        <option value="1">&dollar;</option>
                                                        <option value="2">&euro;</option>
                                                        <option value="3">&#8381;</option>
                                                        <option value="4">&#8372;</option>
                                                    </select>
                                                </div>

                                            </div>
                                            <div class="form-group label-floating is-empty col-md-6">
                                                <div class="col-md-offset-1">
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
                                            <hr>
                                        </div>
                                        <div class="row form-footer text-right">
                                            <a href="{{route('admin.candidates')}}" class="btn btn-default pull-left">Back</a>
                                            <button name="add" type="submit" class="btn btn-success btn-fill">Create...</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
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