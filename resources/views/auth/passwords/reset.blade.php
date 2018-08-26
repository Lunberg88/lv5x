@extends('auth.main')
@section('title', ' :: Reset password')
@section('og-description', 'Reset password')
@section('body')
    <div class="row">
        <div class="col-xs-12 col-sm-8 col-md-4 my-5 mx-auto">

            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <section class="my-5 mx-auto">

                <form class="form-horizontal login-form form--register__body" role="form" method="POST" action="{{ url('/password/reset') }}">
                    {{csrf_field()}}
                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="card wow fadeIn sign--section__form--box sign--mask" data-wow-delay="0.3s">
                        <div class="card-body">
                            <div class="form-header btn-info form--register__user">
                                <h3>
                                    <i class="fa fa-user mt-2 mb-2"></i> reset password:</h3>
                            </div>

                            <div class="md-form">
                                <i class="fa fa-envelope prefix white-text"></i>
                                <input type="email" id="email" name="email" class="form-control{{ $errors->has('email') ? ' validation invalid' : '' }}" value="{{ $email or old('email') }}" required>
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

                            <div class="md-form">
                                <i class="fa fa-lock prefix white-text"></i>
                                <input type="password" id="password-confirm" name="password_confirmation" class="form-control{{ $errors->has('password_confirmation') ? ' validation invalid' : '' }}"  required>
                                <label for="password-confirm">Confirm Password</label>
                                @if ($errors->has('password_confirmation'))
                                    <small class="pull-right">{{ $errors->first('password_confirmation') }}</small>
                                @endif
                            </div>

                            <div class="text-center">
                                <button class="btn btn-info btn-lg">reset password</button>
                            </div>

                        </div>
                    </div>

                </form>

            </section>

        </div>
    </div>
@endsection