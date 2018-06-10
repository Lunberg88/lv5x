@extends('admin.index')
@section('title', ':: '.Auth::user()->name.' - profile')
@section('content')
    <div class="row">
        <form class="form-horizontal" action="{{route('admin.profile.update')}}" method="post" enctype="multipart/form-data" role="form" >
            {{csrf_field()}}
            <div class="col-md-8">
                <div class="card card-mt-5">

                    <div class="card-header card-header-text" data-background-color="blue">
                        <div class="card-inline-box">
                            <i class="material-icons">perm_identity</i>
                        </div>
                        <div class="card-inline-box">
                            <h4 class="card-title">Edit Profile - <small class="category">Complete your profile</small></h4>
                        </div>
                    </div>
                    <div class="card-content">
                            <div class="row"><div class="col-md-12"><br></div></div>
                            <div class="row">
                                <label class="col-sm-2 label-on-left candidate-edit">
                                    <small>Name</small>
                                </label>
                                <div class="col-md-4">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label"></label>
                                        <input type="text" class="form-control" name="name" value="{{Auth::user()->name}}">
                                        <span class="material-input"></span>
                                    </div>
                                </div>
                                <label class="col-sm-2 label-on-left candidate-edit">
                                    <small>Email</small>
                                </label>
                                <div class="col-md-4">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label"></label>
                                        <input type="email" class="form-control" name="email" value="{{Auth::user()->email}}">
                                        <span class="material-input"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-2 label-on-left candidate-edit">
                                    <small>Old pass</small>
                                </label>
                                <div class="col-md-4">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label"><small>Old password</small></label>
                                        <input type="password" class="form-control" name="old_password">
                                        <span class="material-input"></span>
                                    </div>
                                </div>
                                <label class="col-sm-2 label-on-left candidate-edit">
                                    <small>New pass</small>
                                </label>
                                <div class="col-md-4">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label"><small>New password</small></label>
                                        <input type="password" class="form-control" name="new_password">
                                        <span class="material-input"></span>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-rose pull-right">Update Profile</button>
                            <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-profile card-mt-5">
                    <div class="card-avatar">
                        <a href="#">
                            @if(Auth::user()->avatar !== null)
                                <img class="img" src="{{asset('images/avatars/'.Auth::user()->avatar)}}">
                            @else
                                <img src="{{asset('dashboard/assets/img/placeholder.jpg')}}">
                            @endif
                        </a>
                    </div>
                    <div class="card-content">
                        <h6 class="card-category text-gray">Founder - Recruiteriia</h6>
                        <h4 class="card-title">{{$user->name}}</h4>
                        <p class="card-description">
                            Don't be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
            <div class="card card-mt-5">
                <div class="card-header card-header-text" data-background-color="blue">
                    <div class="card-inline-box">
                        <i class="material-icons">perm_identity</i>
                    </div>
                    <div class="card-inline-box">
                        <h4 class="card-title">Change Avatar</h4>
                    </div>
                </div>
                <div class="card-content">
                    <div class="row" data-info="upload_avatar">
                        <div class="col-md-12">
                            <div class="text-center">
                                <button type="button" rel="tooltip" class="col-md-2 btn btn-warning" data-original-title="EditAvatar">
                                    <i class="material-icons">edit</i>
                                    <div class="ripple-container"></div>
                                </button>
                                <p class="pt-2 text-gray">Select new photo or image for new Avatar!</p>
                            </div>
                        </div>
                    </div>
                    <div class="row" data-info="edit_upload_avatar">
                        <div class="col-md-12">
                            <div id="edit-upload-avatar" class="form-group label-floating is-empty hidden">
                                <div class="fileinput text-center fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail">
                                        <img src="{{asset('dashboard/assets/img/placeholder.jpg')}}" style="width:80px;" alt="Upload File">
                                    </div>
                                    <div class="fileinput-preview fileinput-exists thumbnail" style=" padding: 10px 15px;"></div>
                                    <div>
                                                    <span class="btn btn-rose btn-round btn-file">
                                                        <span class="fileinput-new">Select image</span>
                                                        <span class="fileinput-exists">Change</span>
                                                        <input type="hidden" value="" name="edit_upload_avatar">
                                                        <input type="file" name="edit_upload_avatar" id="edit_upload_avatar">
                                                        <div class="ripple-container"></div>
                                                    </span>
                                        <a href="#" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove<div class="ripple-container"><div class="ripple ripple-on ripple-out" style="left: 48.5781px; top: 21.4531px; background-color: rgb(255, 255, 255); transform: scale(15.5489);"></div><div class="ripple ripple-on ripple-out" style="left: 26.75px; top: 18px; background-color: rgb(255, 255, 255); transform: scale(15.5489);"></div></div></a>
                                    </div>
                                </div>
                                <span class="material-input"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
@endsection