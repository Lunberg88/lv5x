@extends('index')
@section('title', ' :: Homepage')
@section('content')
<header id="home">
    <nav class="effect mb-1 fixed-top navbar navbar-expand-lg navbar-dark bg-dark scrolling-navbar top-nav-collapse">
        <a class="navbar-brand brand-roboto" href="#">
            <span class="glyphicon glyphicon-equalizer" aria-hidden="true"></span>
            <span class="navbrand-logo-text">Recruiteriia</span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-4" aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link scroll waves-effect waves-light @if(request()->path() == '/') active-link-route @endif" href="/"> Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link scroll effect waves-effect waves-light @if(request()->path() == 'about') active-link-route @endif" href="/about" data-speed="1200"> About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link waves-effect waves-light @if(request()->path() == 'openings') active-link-route @endif" href="/openings"> Openings</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link waves-effect waves-light @if(request()->path() == 'notes') active-link-route @endif" href="/notes"> Notes</a>
                </li>
                @if (Auth::guest())
                    <li class="nav-item">
                        <a class="nav-link waves-effect waves-light" href="{{ url('/login') }}"><i class="fa fa-sign-in"></i> Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link waves-effect waves-light" href="{{ url('/register') }}"><i class="fa fa-user-plus"></i> Register</a>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle waves-effect waves-light @if(request()->path() == 'profile') active-link-route @endif" id="navbarDropdownMenuLink-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i> Profile </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-cyan" aria-labelledby="navbarDropdownMenuLink-4">
                            <a class="dropdown-item waves-effect waves-light hover-darken" href="{{route('user.profile')}}">My profile</a>
                            @if(Auth::user()->admin != 1)
                            <a class="dropdown-item waves-effect waves-light hover-darken" href="#">
                                CV status:
                            @switch($frontendService->getUserProfile()->status)
                                @case(1)
                                    <span class="labels warning"><b>Pending</b></span>
                                    @break

                                @case(2)
                                    <span class="labels success"><b>Viewed</b></span>
                                    @break

                                @case(3)
                                    <span class="labels info"><b style="font-size: 8px;">Skype interview</b></span>
                                    @break

                                @case(4)
                                    <span class="labels primary"><b>Client review</b></span>
                                    @break

                                @case(5)
                                    <span class="labels danger"><b>Hired</b></span>
                                    @break

                                @default
                                    Inactive

                            @endswitch
                            </a>
                            @endif
                        </div>
                    </li>
                    @if(Auth::user()->admin == '1')
                        <li class="nav-item">
                            <a class="nav-link waves-effect waves-light text-warning link--dashboard" href="{{url('/admin')}}">Dashboard</a>
                        </li>
                    @endif
                    <li>
                        <a class="nav-link waves-effect waves-light" href="{{ url('/logout') }}"
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
    </nav>
</header>
<div class="z-depth-1-half">
    <div class="section-bg">
        <div class="logo-bg">
            <div class="container">
                <div class="row new-container pt-5">
                    <div class="col-md-8">
                        <h1>{!! $frontendService->getSettingsValueByKey('homepage_headline_text') !!}</h1>
                    </div>
                    <div class="col-md-8 d-block">
                        <p class="logo-description d-none d-md-block text-center">
                            {!! $frontendService->getSettingsValueByKey('homepage_headline_description') !!}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container container-fluid">
    @yield('body')
</div>
<footer class="page-footer new-foot stylish-color-dark">
    <div class="container">
        <div class="row py-3 d-flex align-items-center">
            <div class="col-md-8 col-lg-9">
                <p class="text-center text-md-left grey-text">© 2018 <a href="{{route('main')}}"><small>Recruiter-Iia</small></a></p>
            </div>
            <div class="col-md-4 col-lg-3 ml-lg-0">
                <div class="social-section text-center text-md-left">
                    <ul>
                        <li><a href="https://www.facebook.com/profile.php?id=100005553609706" class="btn-floating btn-sm rgba-white-slight mr-xl-4" target="_blank"><i class="fa fa-facebook bg-primary d-block pb-1"></i></a></li>
                        <li><a href="https://plus.google.com/u/0/105578728058530995572" class="btn-floating btn-sm rgba-white-slight mr-xl-4" target="_blank"><i class="fa fa-google-plus bg-danger d-block pb-1"></i></a></li>
                        <li><a href="https://www.linkedin.com/in/iia-mizina-382b666b/" class="btn-floating btn-sm rgba-white-slight mr-xl-4" target="_blank"><i class="fa fa-linkedin bg-info d-block pb-1"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
@endsection