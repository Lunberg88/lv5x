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
                    @if (Auth::guest())
                        <li class="nav-item">
                            <a class="nav-link waves-effect waves-light @if(request()->path() == 'login') active-link-route @endif" href="{{ url('/login') }}"><i class="fa fa-sign-in"></i> Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link waves-effect waves-light @if(request()->path() == 'register') active-link-route @endif" href="{{ url('/register') }}"><i class="fa fa-user-plus"></i> Register</a>
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-light @if(request()->path() == 'profile') active-link-route @endif" id="navbarDropdownMenuLink-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i> Profile </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-cyan" aria-labelledby="navbarDropdownMenuLink-4">
                                <a class="dropdown-item waves-effect waves-light hover-darken" href="{{route('user.profile')}}">My profile</a>
                                @if(isset($user_profile) && $user_profile !== null)


                                    <a class="dropdown-item waves-effect waves-light hover-darken" href="#">
                                        CV status:
                                        @if($user_profile->status == 1)
                                            <span class="labels warning"><b>Pending</b></span>
                                        @elseif($user_profile->status == 2)
                                            <span class="labels success"><b>Viewed</b></span>
                                        @elseif($user_profile->status == 3)
                                            <span class="labels info"><b style="font-size: 8px;">Skype interview</b></span>
                                        @elseif($user_profile->status == 4)
                                            <span class="labels primary"><b>Client review</b></span>
                                        @elseif($user_profile->status == 5)
                                            <span class="labels danger"><b>Hired</b></span>
                                        @else
                                            Inactive
                                        @endif
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
    <div class="container-fluid sign--section">
        @yield('body')
    </div>
@endsection
