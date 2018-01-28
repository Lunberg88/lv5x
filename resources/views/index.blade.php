<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Iya Web-HR</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
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

        .favs > * {
            cursor: pointer;
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
                    <li><a href="/blog" class="scroll">BLOG</a></li>
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}"><i class="fa fa-sign-in" aria-hidden="true"></i> LOGIN</a></li>
                        <li><a href="{{ url('/register') }}"><i class="fa fa-user-plus" aria-hidden="true"></i> REGISTER</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">PROFILE <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <p>
                                        <span style="color: #232323; font-size: 11px; padding-left: 5px;">
                                            @if(isset($user_profile) && $user_profile !== null)
                                                @foreach($user_profile as $user)
                                                    CV status:
                                                            @if($user->status === 1)
                                                                <span class="label label-warning"><b>Pending</b></span>
                                                                @elseif($user->status === 2)
                                                                <span class="label label-success"><b>Viewed</b></span>
                                                                @elseif($user->status === 3)
                                                                <span class="label label-info"><b style="font-size: 8px;">Skype interview</b></span>
                                                                @elseif($user->status === 4)
                                                                <span class="label label-primary"><b>Client review</b></span>
                                                                @elseif($user->status === 5)
                                                                <span class="label label-danger"><b>Hired</b></span>
                                                                @else
                                                                Inactive
                                                            @endif
                                                @endforeach
                                            @endif
                                        </span>
                                    </p>
                                </li>
                                <li>
                                    <p>
                                        <b style="color: #232323; font-size: 11px; padding-left: 5px;">
                                            <a href="{{route('index.profile.favs')}}">Favourites</a>
                                        </b>
                                        @if(isset($user_favs) && $user_favs !== null)
                                            @foreach($user_favs as $favs)
                                                <p>
                                                    <a href="/openings-{{$favs->opening_id}}">
                                                        {{$favs->title}}
                                                    </a>
                                                </p>
                                            @endforeach
                                        @else
                                            <small>Empty...</small>
                                        @endif
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
    @if($role->rolename === "globaladmin")
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
<script>
        //Add to favourite
        var url = 'http://ajax_lv/openings/addfav';

        function addToFav(val) {

            $.post(url, {
                '_token': $('meta[name="csrf-token"]').attr('content'),
                'id': val.id
            }).done(function(data) {
                var selId = $('#' + val.id + ' > i');
                var text = $('#' + val.id + ' > small');
                selId.removeClass('fa-star-o');
                selId.addClass('fa-star');
            })
        }
</script>
</body>
</html>