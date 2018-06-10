@extends('auth.main')
@section('title', ' :: Register')
@section('og-description', 'Register')
@section('body')
    <div class="row">
        <div class="col-xs-12 col-sm-8 col-md-4 my-5 mx-auto">

            <section class="my-5 mx-auto">
                <form class="form-horizontal login-form form--register__body" action="{{url('/login')}}" method="post" name="sign-up">
                    {{csrf_field()}}
                    <div class="card wow fadeIn sign--section__form--box sign--mask" data-wow-delay="0.3s">
                        <div class="card-body">
                            <div class="form-header btn-info form--register__user">
                                <h3>
                                    <i class="fa fa-user mt-2 mb-2"></i> Sign In:</h3>
                            </div>

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
                                <button class="btn btn-info btn-lg">Sign In</button>
                            </div>

                        </div>
                    </div>
                </form>
            </section>

        </div>
    </div>
@endsection