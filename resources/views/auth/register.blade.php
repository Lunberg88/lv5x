@extends('frontend.auth')
@section('title', ':: Sign Up')
@section('content')
<header>
    <section class="view intro-2 hm-stylish-strong">
        <div class="full-bg-img flex-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-offset-4 col-md-8 col-sm-12">
                        <!--Form with header-->
                        <div class="card wow fadeIn login-form" data-wow-delay="0.3s">
                            <div class="card-body">
                                <!--Header-->
                                <div class="form-header btn-header-info">
                                    <h3><i class="fa fa-user-plus mt-2 mb-2"></i> sign up:</h3>
                                </div>
                                <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                                {{ csrf_field() }}
                                <!--Body-->
                                    <div class="md-form">
                                        <i class="fa fa-user prefix white-text"></i>
                                        <input type="text" id="name" name="name" class="form-control{{ $errors->has('name') ? ' validation invalid' : '' }}" value="{{ old('name') }}" required>
                                        <label for="name">First Name/Last Name</label>
                                        @if ($errors->has('name'))
                                            <small class="pull-right">{{ $errors->first('name') }}</small>
                                        @endif
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
                                        <i class="fa fa-code prefix white-text"></i>
                                        <select id="stack" class="form-control" name="stack" required>
                                            <option value="1">Frontend</option>
                                            <option value="2">Backend</option>
                                            <option value="3">Full Stack</option>
                                            <option value="4">Design</option>
                                            <option value="5">Mobile</option>
                                            <option value="6">Other...</option>
                                        </select>
                                        <label for="stack">Stack</label>
                                    </div>
                                    <div class="md-form">
                                        <i class="fa fa-tags prefix white-text"></i>
                                        <input type="text" id="tags" name="tags" class="form-control"  required>
                                        <label for="tags">Tags</label>
                                    </div>
                                    <div class="md-form">
                                        <i class="fa fa-dollar prefix white-text"></i>
                                        <input type="text" id="salary" name="salary" class="form-control"  required>
                                        <label for="salary">Expected Salary</label>
                                    </div>
                                    <div class="md-form">
                                        <i class="fa fa-link prefix white-text"></i>
                                        <input type="text" id="cv" name="cv" class="form-control"  required>
                                        <label for="cv">Shared CV(Insert link)</label>
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
                                        <input type="password" id="password_confirm" name="password_confirmation" class="form-control"  required>
                                        <label for="password_confirm">Confirm password</label>
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
                {{--<div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="panel panel-default">
                            <div class="panel-heading">Register</div>
                            <div class="panel-body">
                                <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}" enctype="multipart/form-data">
                                    {{ csrf_field() }}

                                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                        <label for="name" class="col-md-4 control-label">First name, Last name</label>

                                        <div class="col-md-6">
                                            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                            @if ($errors->has('name'))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                        <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                        <div class="col-md-6">
                                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                            @if ($errors->has('email'))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="stack" class="col-md-4 control-label">Stack</label>

                                        <div class="col-md-6">
                                            <select id="stack" class="form-control" name="stack" required>
                                                <option value="1">Frontend</option>
                                                <option value="2">Backend</option>
                                                <option value="3">Full Stack</option>
                                                <option value="4">Design</option>
                                                <option value="5">Mobile</option>
                                                <option value="6">Other...</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="tags" class="col-md-4 control-label">Tags</label>

                                        <div class="col-md-6">
                                            <input id="tags" type="text" name="tags" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="salary" class="col-md-4 control-label">Expected salary</label>

                                        <div class="col-md-6">
                                            <input id="salary" type="text" name="salary" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="cv" class="col-md-4 control-label">Shared CV (Insert link)</label>

                                        <div class="col-md-6">
                                            <input id="cv" type="text" name="cv" class="form-control" required>
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
                                        <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                                        <div class="col-md-6">
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-4">
                                            <button type="submit" class="btn btn-primary">
                                                Register
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>--}}
            </div>
        </div>
    </section>
</header>
@endsection

