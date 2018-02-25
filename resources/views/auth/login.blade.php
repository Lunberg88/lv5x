@extends('frontend.auth')
@section('content')
{{--
<section class="login">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default login-container">

                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label">Password</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Login
                                    </button>

                                    <a class="btn btn-link" href="{{ url('/password/reset') }}">
                                        Forgot Your Password?
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
--}}
<header>
    <section class="view intro-2 hm-stylish-strong">
        <div class="full-bg-img flex-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-5 col-lg-6 col-md-10 col-sm-12 mx-auto mt-lg-5">

                        <!--Form with header-->
                        <div class="card wow fadeIn login-form" data-wow-delay="0.3s">
                            <div class="card-body">

                                <!--Header-->
                                    <div class="form-header btn-header-info">
                                        <h3><i class="fa fa-user mt-2 mb-2"></i> Log in:</h3>
                                    </div>

                                <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                                {{ csrf_field() }}
                                    <!--Body-->
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
                        <!--/Form with header-->

                    </div>
                </div>
            </div>
        </div>
    </section>
</header>


@endsection

