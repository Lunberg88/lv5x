@extends('auth.main')
@section('title', ' :: Password reset')
@section('og-description', 'Password reset')
@section('body')
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3 my-5 mx-auto">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <section class="my-5 mx-auto">
                    <form class="form-horizontal login-form form--register__body" action="{{url('/password/email')}}" method="post" name="sign-up">
                        {{csrf_field()}}
                        <div class="card wow fadeIn sign--section__form--box sign--mask" data-wow-delay="0.3s">
                            <div class="card-body">
                                <div class="form-header btn-info form--register__user">
                                    <h3>
                                        <i class="fa fa-user mt-2 mb-2"></i> reset password:</h3>
                                </div>

                                <div class="md-form">
                                    <i class="fa fa-envelope prefix white-text"></i>
                                    <input type="email" id="email" name="email" class="form-control{{ $errors->has('email') ? ' validation invalid' : '' }}" value="{{ old('email') }}" required>
                                    <label for="email">Your email</label>
                                    @if ($errors->has('email'))
                                        <small class="pull-right">{{ $errors->first('email') }}</small>
                                    @endif
                                </div>

                                <div class="text-center">
                                    <button class="btn btn-info btn-lg">send password reset link</button>
                                </div>

                            </div>
                        </div>
                    </form>
            </section>
        </div>
    </div>
@endsection