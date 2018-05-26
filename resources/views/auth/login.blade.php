@extends('frontend.auth')
@section('title', ':: Sign In')
@section('content')
<header>
    <section class="view intro-2 hm-stylish-strong">
        <div class="full-bg-img flex-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-5 col-lg-6 col-md-10 col-sm-12 mx-auto mt-lg-5">
                        <div class="card wow fadeIn login-form" data-wow-delay="0.3s">
                            <div class="card-body">
                                    <div class="form-header btn-header-info">
                                        <h3><i class="fa fa-user mt-2 mb-2"></i> sign in:</h3>
                                    </div>
                                <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                                {{ csrf_field() }}
                                    <div class="md-form">
                                        <i class="fa fa-envelope prefix white-text"></i>
                                        <input type="email" id="email" name="email" class="form-control{{ $errors->has('email') ? ' validation invalid' : '' }}" value="{{ old('email') }}" required>
                                        <label for="email">Your email</label>
                                        @if ($errors->has('email'))
                                            <small class="pull-right">{{ $errors->first('email') }}</small>
                                        @endif
                                    </div>
                                    <div class="md-form">
                                        <i class="fa fa-lock prefix white-text"></i>
                                        <input type="password" id="password" name="password" class="form-control{{ $errors->has('password') ? ' validation invalid' : '' }}"  required>
                                        <label for="password">Your password</label>
                                        @if ($errors->has('password'))
                                            <small class="pull-right">{{ $errors->first('password') }}</small>
                                        @endif
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="defaultCheckbox1" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="defaultCheckbox1">
                                            Remember Me
                                        </label>
                                        <a class="btn btn-link" href="{{ url('/password/reset') }}">
                                            Forgot Your Password?
                                        </a>
                                    </div>
                                    <div class="text-center">
                                        <button class="btn btn-info btn-lg">Sign up</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-5 col-lg-6 col-md-10 col-sm-12 mx-auto mt-lg-5 mt-2">
                        <span class="d-block float-left">
                            <a href="{{url()->previous()}}" class="btn btn-outline-default btn-sm waves-effect">
                                <i class="fa fa-arrow-left"></i>
                                back
                            </a>
                        </span>
                        <span class="d-block float-right">
                            <a href="{{route('register')}}" class="btn btn-outline-info btn-sm waves-effect">
                                <i class="fa fa-user-plus"></i>
                                register
                            </a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </section>
</header>
@endsection

