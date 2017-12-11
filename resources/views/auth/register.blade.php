<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Iya Web-HR</title>
    <link href="/css/app.css" rel="stylesheet">
    <link rel="stylesheet" href="main-theme/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="main-theme/css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:700%7cRaleway:400,700" rel="stylesheet">
    <style type="text/css">
        .doc {
            width: 100%;
            height: 2000px;
            border: 0px;
        }
        .cv_frame {
            width: 100%;
            height: 2000px;
            border: 0px;
        }
    </style>
    <!--[if lt IE 9]>
    <script src="js/ie/html5shiv.min.js"></script>
    <script src="js/ie/respond.min.js"></script>
    <![endif]-->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
<div class="preloader-con">
    <div class="preloader center">
        <span class="ball"></span>
        <span class="ball"></span>
        <span class="ball"></span>
    </div>
</div>
<section class="login">
    <div class="container">
        <div class="row">
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
        </div>
    </div>
</section>
<script src="main-theme/js/jquery.min.js"></script>
<script src="main-theme/js/bootstrap.min.js"></script>
<script src="main-theme/js/custom.js"></script>
</body>
</html>
