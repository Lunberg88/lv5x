@extends('admin.index')
@section('title', ':: '.Auth::user()->name.' - profile')
@section('content')
    <div class="row">
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
                        <form class="form-horizontal" role="form">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group label-floating is-empty">
                                        <label class="bmd-label-floating">Username</label>
                                        <input type="text" class="form-control">
                                    </div>

                                </div>
                                <div class="col-md-4">
                                    <div class="form-group label-floating is-empty">
                                        <label class="bmd-label-floating">Email address</label>
                                        <input type="email" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group label-floating is-empty">
                                        <label class="bmd-label-floating">Fist Name</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group label-floating is-empty">
                                        <label class="bmd-label-floating">Last Name</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-rose pull-right">Update Profile</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-profile card-mt-5">
                    <div class="card-avatar">
                        <a href="#">
                            <img class="img" src="{{asset('dashboard/assets/img/faces/avatar.jpg')}}">
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
        </div>
@endsection