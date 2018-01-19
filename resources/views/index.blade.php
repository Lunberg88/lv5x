<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Iya Web-HR</title>
    <!--<link href="/css/app.css" rel="stylesheet">-->
    <link rel="stylesheet" href="/main-theme/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/css/font-awesome.min.css">
    <link rel="stylesheet" href="/main-theme/css/style.css">
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
{{--
@if($days !== false)
    <img src="http://theartmad.com/wp-content/uploads/2015/10/Transparent-Halloween-Clip-Art7.png" alt="" class="hollyday-datel">
@endif
--}}
<a href="#home" class="scroll scroll-up costum-bg effect response" data-speed="1600">
    <i class="fa fa-chevron-up"></i>
</a>
<header class="nav-wrapper effect">
    <nav class="navbar-custom">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span> </button>
                <a class="navbar-brand" href="/">
                    <span class="glyphicon glyphicon-equalizer" aria-hidden="true"></span>Iya Web-HR</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#home" class="scroll active" data-speed="800">HOME</a></li>
                    <li><a href="#about" class="scroll" data-speed="1000">ABOUT</a></li>
                    <li><a href="#contact" class="scroll" data-speed="1800">CONTACT</a></li>

                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}"><i class="fa fa-sign-in" aria-hidden="true"></i> LOGIN</a></li>
                        <li><a href="{{ url('/register') }}"><i class="fa fa-user-plus" aria-hidden="true"></i> REGISTER</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">PROFILE <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Status</a></li>
                                <li>
                                    <p>
                                        <span style="color: red; font-size: 11px; padding-left: 10px;">
                                            @if(isset($user_profile) && $user_profile !== null)
                                                @foreach($user_profile as $user)
                                                    CV status: <span class="label label-danger"><b>Client review</b></span>
                                                @endforeach
                                            @endif
                                        </span>
                                    </p>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{ url('/logout') }}"
                               onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                <i class="fa fa-sign-out" aria-hidden="true"></i> LOGOUT ({{ Auth::user()->name }})
                            </a>
                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</header>
@yield('profile-status')
@yield('content')
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 text-center">
                <div class="social-icons">
                    <a href="#">
                        <i class="fa fa-facebook effect" aria-hidden="true"></i>
                    </a>
                    <a href="#">
                        <i class="fa fa-twitter effect" aria-hidden="true"></i>
                    </a>
                    <a href="#">
                        <i class="fa fa-instagram effect" aria-hidden="true"></i>
                    </a>
                    <a href="#">
                        <i class="fa fa-pinterest-p effect" aria-hidden="true"></i>
                    </a>
                    <a href="#">
                        <i class="fa fa-linkedin effect" aria-hidden="true"></i>
                    </a>
                </div>
                <p>
                    <span class="costum-color"> Iya Web-HR</span> &copy; 2017. All rights reserved.</p>
            </div>
        </div>
    </div>
</footer>
@if(Auth::user())
@foreach(Auth::user()->roles as $role)
    @if($role->rolename === "GlobalAdmin")
        <div class="admin-dashboard-lnk">
            <a href="/admin" class="scroll button costum-bg-two">
                <p>D</p>
                <p>a</p>
                <p>s</p>
                <p>h</p>
                <p>b</p>
                <p>o</p>
                <p>a</p>
                <p>r</p>
                <p>d</p>
            </a>
        </div>
    @endif
@endforeach
@endif
<script src="/main-theme/js/jquery.min.js"></script>
<script src="/main-theme/js/bootstrap.min.js"></script>
<script src="/main-theme/js/custom.js"></script>
</body>
</html>