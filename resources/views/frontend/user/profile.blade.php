@extends('frontend.index')
@section('title', ' :: '.Auth::user()->name.' - Profile')
@section('body')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="d-block pt-5">
                    <h5 class="text-capitalize text-info font-weight-normal">Personal information:</h5>
                    <span class="d-block border border-bottom-2 border-info"></span>
                </div>
                <div class="d-block py-5">
                    <form name="update-profile" role="form" action="{{route('user.profile.update')}}" method="post">
                        {{csrf_field()}}
                        <div class="md-form">
                            <input type="text" id="username" name="name" class="form-control" value="{{$user->name}}">
                            <label for="username">
                                <i class="fa fa-user"></i>
                                Username
                            </label>
                        </div>
                        <div class="md-form">
                            <input type="email" id="email" name="email" class="form-control" value="{{$user->email}}">
                            <label for="email">
                                <i class="fa fa-envelope"></i>
                                Email
                            </label>
                        </div>
                        <br>
                        <div class="md-form">
                            <input type="password" id="password" name="password" class="form-control">
                            <label for="password">
                                <i class="fa fa-unlock"></i>
                                Old password
                            </label>
                        </div>
                        <div class="md-form">
                            <input type="password" id="new_password" name="new_password" class="form-control">
                            <label for="new_password">
                                <i class="fa fa-lock"></i>
                                New password
                            </label>
                        </div>
                        <br>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="@if($subscribe == 1) 0 @else 1 @endif" id="subscribe" name="subscribe">
                            <label class="form-check-label" for="subscribe">
                                <b>{{$subscribe == 1 ? 'Unsubscribe' : 'Subscribe'}}</b> <small>(For new hot openings)</small>
                            </label>
                            @if($subscribe == 1)<label class="float-right"><u>Subscribed</u></label>@endif
                        </div>
                        <br>
                        <div class="md-form">
                            <button type="submit" class="btn btn-primary btn-sm">Update profile</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-6">
                <div class="d-block py-5">
                     <h5 class="text-capitalize text-info font-weight-normal">Your applied openings: @if(count(Auth::user()->openings) > 0) ({{count(Auth::user()->openings)}}) @endif</h5>
                    <span class="d-block border border-bottom-2 border-info"></span>
                </div>

                    @foreach(Auth::user()->openings as $i => $open)
                            <div class="single-news mb-4">
                                <div class="row">
                                    <div class="d-none d-sm-block col-md-3">
                                        <div class="view overlay rounded z-depth-1 mb-0">
                                            <div style="background: url({{route('main')}}/images/openings/{{$open->opening->img}}) no-repeat; width: 120px; height: 80px; background-position: center; background-size: cover"></div>
                                            <a href="{{route('index.show.opening', $open->opening->slug)}}">
                                                <div class="mask rgba-white-slight waves-effect waves-light"></div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-9">
                                        <p class="dark-grey-text">
                                            <small class="text-secondary">
                                                @php
                                                   echo (explode(' ', $open->opening->created_at))[0]
                                                @endphp
                                            </small> / <span class="badge badge-{{$open->opening->status == 1 ? 'success' : 'danger'}}">{{$open->opening->status == 1 ? 'active' : 'closed'}}</span>
                                            / &dollar; <small>{{$open->opening->salary}}</small>
                                        </p>
                                        <div class="d-flex justify-content-between">
                                            <div class="col-11 text-truncate pl-0 mb-3">
                                                <a href="{{route('index.show.opening', $open->opening->slug)}}" class="text-info">
                                                    {!! mb_strimwidth($open->opening->title, 0, 155, '...') !!}
                                                </a>
                                            </div>
                                            <a><i class="fa fa-angle-double-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    @endforeach

            </div>
        </div>
    </div>
@endsection