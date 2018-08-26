@extends('admin.index')
@section('title', ':: Edit profile - '.$candidate->fio)
@section('content')
        @can('update', $candidate)
        <div class="row">
            <div class="col-md-offset-2 col-md-8">
                <!-- -->
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="blue">
                        <div class="card-inline-box">
                            <i class="material-icons">person_add</i>
                        </div>
                        <div class="card-inline-box">
                            <h4 class="card-title">Edit candidate info</h4>
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="row"><div class="col-md-12"><br></div></div>
                        <div class="row">
                            <div class="col-md-12">
                                <form class="form-horizontal" method="POST" action="{{ route('admin.candidates.update', $candidate->id) }}" enctype="multipart/form-data" novalidate="novalidate">
                                    <input type="hidden" name="_method" value="PUT">
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <label class="col-sm-2 label-on-left candidate-edit">Name</label>
                                        <div class="col-md-10">
                                            <div class="form-group label-floating is-empty">
                                                <label class="control-label"></label>
                                                <input class="form-control" name="fio" type="text" autofocus value="{{$candidate->fio}}">
                                                <span class="material-input"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-2 label-on-left candidate-edit">Email</label>
                                        <div class="col-md-10">
                                            <div class="form-group label-floating is-empty">
                                                <label class="control-label"></label>
                                                <input class="form-control" name="email" id="email" type="email" autofocus value="{{$candidate->email}}">
                                                <span class="material-input"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-2 label-on-left candidate-edit">CV</label>
                                        <div class="col-md-10">
                                            <div class="form-group label-floating is-empty">
                                                <label class="control-label"></label>
                                                <input class="form-control" name="cvs" type="text" value="{{$candidate->cvs}}">
                                                <span class="material-input"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group label-floating is-empty">
                                        <select class="form-control" name="stack">
                                            <option disabled="disabled" selected="selected">Choose stack</option>
                                            @if($stacks)
                                                @foreach($stacks as $i => $stack)
                                                    <option value="{{$i + 1}}" {{($candidate->stack == ($i + 1) ? 'selected' : '')}}>{{$stack}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-2 label-on-left candidate-edit">Skills</label>
                                        <div class="col-md-10">
                                            <div class="bootstrap-tagsinput">
                                                <input type="text" placeholder="" size="1">
                                            </div>
                                            <input type="text" value="{{$candidate->tags}}" name="tags" class="tagsinput" data-role="tagsinput" data-color="rose" style="display: none;" placeholder="tags...">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <hr>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="col-md-3 label-on-left candidate-edit">Salary</label>
                                            <div class="col-md-5">
                                                <div class="form-group label-floating is-empty">
                                                    <label class="control-label"></label>
                                                    <input class="form-control" name="salary" type="text" value="{{$candidate->salary}}">
                                                    <span class="material-input"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <select name="currency" class="form-control">
                                                    @php
                                                        for($i = 1; $i<(count($currency) + 1); $i++) {
                                                            echo '<option value='.$i.' '.($candidate->currency == $i ? "selected": "").'>'.$currency[$i].'</option>';
                                                        }
                                                    @endphp
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="col-md-4 label-on-left candidate-edit">Rate</label>
                                            <div class="form-group input-group label-floating is-empty col-md-8">
                                                <label class="control-label"></label>
                                                <input class="form-control" name="rate" type="text" value="{{$candidate->rate}}">
                                                <span class="material-input"></span>
                                                <span class="input-group-addon">&dollar;</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <hr>
                                    </div>
                                    <div class="row" data-info="upload_cvs">
                                        <label class="col-sm-2 label-on-left candidate-edit"><small><b>Sticky CV's</b></small></label>
                                        <div class="col-md-10">
                                            <div class="form-group label-floating is-empty">
                                                <label class="control-label"></label>
                                                @if(isset($candidate->upload_cvs) && $candidate->upload_cvs !== null)
                                                <input style="background: #eee; text-align: left;" disabled class="col-md-4 form-control" type="text" name="existing_cvs" value="
                                                @php if(isset($candidate->upload_cvs) && $candidate->upload_cvs !== null) {
                                                       echo $candidate->upload_cvs;
                                                }
                                                @endphp
                                                ">
                                                <button rel="tooltip" class="col-md-2 pull-right btn btn-danger" data-original-title="Remove" value="false" title="Remove" name="delete_cvs" style="display: @if(isset($candidate->upload_cvs) && $candidate->upload_cvs !== null) block @else none @endif">
                                                    <i class="material-icons">close</i>
                                                    <div class="ripple-container"></div>
                                                </button>
                                                @endif
                                                <button type="button" rel="tooltip" class="col-md-2 pull-right btn btn-warning" data-original-title="Edit" title="Edit">
                                                    <i class="material-icons">edit</i>
                                                    <div class="ripple-container"></div>
                                                </button>
                                                <span class="material-input"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <hr>
                                    </div>
                                    <div class="row" data-info="edit_upload_cvs">
                                        <div class="col-md-offset-2 col-md-10">
                                            <div id="edit-upload-cvs" class="form-group label-floating is-empty hidden">
                                                <label class="control-label">
                                                    <small>Upload CV from storage</small>
                                                </label><br/>
                                                <div class="fileinput text-center fileinput-new" data-provides="fileinput">
                                                    <div class="fileinput-new thumbnail">
                                                        <img src="{{asset('dashboard/assets/img/placeholder.jpg')}}" style="width:80px;" alt="Upload File">
                                                    </div>
                                                    <div class="fileinput-preview fileinput-exists thumbnail" style=" padding: 10px 15px;"></div>
                                                    <div>
                                                    <span class="btn btn-rose btn-round btn-file">
                                                        <span class="fileinput-new">Select CVS file</span>
                                                        <span class="fileinput-exists">Change</span>
                                                        <input type="hidden" value="" name="edit_upload_cvs">
                                                        <input type="file" name="edit_upload_cvs" id="edit_upload_cvs">
                                                        <div class="ripple-container"></div>
                                                    </span>
                                                        <a href="#" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove<div class="ripple-container"><div class="ripple ripple-on ripple-out" style="left: 48.5781px; top: 21.4531px; background-color: rgb(255, 255, 255); transform: scale(15.5489);"></div><div class="ripple ripple-on ripple-out" style="left: 26.75px; top: 18px; background-color: rgb(255, 255, 255); transform: scale(15.5489);"></div></div></a>
                                                    </div>
                                                </div>
                                                <span class="material-input"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label">Custom information</label><br>
                                        <textarea name="custom_info" cols="10" rows="5"
                                                  class="form-control">{{$candidate->custom_info}}</textarea>
                                    </div>

                                    <div class="form-footer text-right">
                                        <a href="{{route('admin.candidates')}}" class="btn btn-default pull-left">Back</a>
                                        <button name="add" type="submit" class="btn btn-success btn-fill">Update...</button>
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
                You don't have permission's for this operation!
            </div>
        @endcan()
@endsection()