@extends('index')
@section('title', ' :: Openings')
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
                    <a class="nav-link scroll waves-effect waves-light" href="/"> Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link scroll effect waves-effect waves-light" href="/#about" data-speed="1200"> About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link scroll waves-effect waves-light" href="/#contact"> Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link waves-effect waves-light" href="/openings"> Openings</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link waves-effect waves-light" href="#"> Blog</a>
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
                        <a class="nav-link dropdown-toggle waves-effect waves-light" id="navbarDropdownMenuLink-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i> Profile </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-cyan" aria-labelledby="navbarDropdownMenuLink-4">
                            <a class="dropdown-item waves-effect waves-light hover-darken" href="#">My account</a>
                            @if(isset($user_profile) && $user_profile !== null)

                                @foreach($user_profile as $user)
                                    <a class="dropdown-item waves-effect waves-light hover-darken" href="#">
                                        CV status:
                                        @if($user->status === 1)
                                            <span class="labels warning"><b>Pending</b></span>
                                        @elseif($user->status === 2)
                                            <span class="labels success"><b>Viewed</b></span>
                                        @elseif($user->status === 3)
                                            <span class="labels info"><b style="font-size: 8px;">Skype interview</b></span>
                                        @elseif($user->status === 4)
                                            <span class="labels primary"><b>Client review</b></span>
                                        @elseif($user->status === 5)
                                            <span class="labels danger"><b>Hired</b></span>
                                        @else
                                            Inactive
                                        @endif
                                    </a>
                                @endforeach

                            @endif
                        </div>
                    </li>
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
                <div class="row new-container">
                    <h1>welcome to recruiter-iia</h1>
                    <p class="logo-description">
                        <b>
                            Most Popular's Front-end Technologic's: AngularJS, Angular 2, ReactJS, VueJS, HTML5/CSS3, Bootstrap, Java, CoffeScript, TypeScript end ect.
                        </b>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <section class="section-opening-header">
                            <h4>Openings list</h4>
                        </section>
                    </div>
                </div>
                <div class="row">
                    <div class="card-deck">
                @foreach($openings as $i => $open)
                        <div class="mb-4 col-sm-12 col-md-4">
                            <div class="view overlay rounded z-depth-2 mb-2">
                                <img class="img-fluid opening-list-img" src="{{route('main')}}/images/openings/{{$open->img}}" alt="Card image cap">
                                <a data-target="#opening-{{ $open->id }}" data-toggle="modal">
                                    <div class="mask rgba-white-slight waves-effect waves-light"></div>
                                </a>
                            </div>
                            <h4 class="mb-3 font-weight-bold dark-grey-text">
                                <strong>
                                    {!! str_limit($open->title, 15) !!}
                                </strong>
                            </h4>
                            <span class="btn-sm" style="display: block; padding-top: 10px;">
                                <span class="
                                {{ $open->type == 1 ? 'badge badge-warning' : 'badge badge-success' }}
                                        ">{{ $open->type == 1 ? 'relocate' : 'remote' }}
                                </span>
                            </span>
                            <p class="normal-text">
                                {!! str_limit($open->description, 85) !!}
                            </p>
                            <button type="button" data-toggle="modal" data-target="#opening-{{ $open->id }}" class="btn btn-info btn-sm waves-effect waves-light">view opening</button>
                            <span class="pull-right">
                                <span class="badge indigo"><i class="fa fa-facebook"></i></span>
                                <span class="badge badge-danger"><i class="fa fa-google-plus"></i></span>
                                <span class="badge badge-info"><i class="fa fa-linkedin"></i></span>
                            </span>
                           {{-- {!! $social_links !!} --}}
                        </div>
                        <!-- modal -->
                        <div class="modal fade" id="opening-{{ $open->id }}" tabindex="-1" role="dialog" aria-labelledby="opening-{{ $open->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title modal-opening-title" id="opening-{{ $open->id }}">{!! $open->title !!}</h5>
                                    </div>
                                    <div class="row modal-body modal-opening-body">
                                        <div class="col-md-4">
                                            <img class="img-fluid hp-img" src="{{route('main')}}/images/openings/{{$open->img}}" alt="Card image cap">
                                        </div>
                                        <div class="col-md-8">
                                            <span class="opening-list-date">{{ (explode(' ', $open->created_at))[0] }}</span>
                                            <span class="opening-list-status pull-right">
                                        <label class="{{ $open->status == 1 ? 'green-text' : 'red-text' }}">{{ $open->status == 1 ? 'active' : 'closed' }}</label>
                                    </span>
                                            <p>{!! $open->description !!}</p>
                                            <span class="opening-list-salary pull-left">Rate:  <b>&dollar;{{ $open->salary }}</b></span>
                                            <span class="opening-list-location pull-right">Location: <i class="fa fa-map-marker"></i> <b>{{ $open->location }}</b></span>
                                        </div>
                                    </div>
                                    <div class="modal-footer modal-footer-btns">
                                        <button type="button" class="btn btn-warning waves-effect btn-sm pull-left">Apply Now</button>
                                        <button type="button" class="btn btn-outline-elegant waves-effect save-op btn-sm pull-left" id="{{ $open->id }}" onclick="addToFav(this);">
                                            <i class="@php
                                                $fav = \App\UserFavs::where([
                                                    ['user_id', '=', Auth::id()],
                                                    ['opening_id', '=', $open->id],
                                                ])->get();
                                                echo $fav->isEmpty() ? "fa fa-star-o" : "fa fa-star";
                                            @endphp"></i>
                                            Save</button>
                                        <button type="button" class="btn btn-danger modal-close-btn waves-effect btn-sm pull-right" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                @endforeach
                    </div>
                </div>
                <div class="row hidden">
                    <div id="get_openings" class="card-deck">

                    </div>
                </div>
            </div>
            <div class="col-md-2 justify-content-center">
                <div class="center-block form-group openings-tools-bar">
                    <h4 style="font-family: Roboto, sans-serif; font-size: 18px;">type</h4>
                    <hr>
                    <form method="post">
                        {{csrf_field()}}
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="type[]" value="0" id="type-1">
                        <label class="form-check-label" for="type-1">
                            remote
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="type[]" value="1" id="type-2">
                        <label class="form-check-label" for="type-2">
                            relocate
                        </label>
                    </div>
                    <h4 style="font-family: Roboto, sans-serif; font-size: 18px;">status</h4>
                    <hr>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status[]" value="0" id="status-1">
                        <label class="form-check-label" for="status-1">
                            closed
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status[]" value="1" id="status-2">
                        <label class="form-check-label" for="status-2">
                            active
                        </label>
                    </div>
                    <button type="submit" id="get_openings" class="btn btn-teal waves-effect waves-light pull-right btn-sm">search</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <div align="center" class="opening-pagination">{{$openings->links()}}</div>
            </div>
        </div>
    </div>
<footer class="page-footer new-foot stylish-color-dark">
    <div class="container">
        <div class="row py-3 d-flex align-items-center">
            <div class="col-md-8 col-lg-9">
                <p class="text-center text-md-left grey-text">© 2018 <a href="#"><small>Recuiter-Iia</small></a></p>
            </div>
            <div class="col-md-4 col-lg-3 ml-lg-0">
                <div class="social-section text-center text-md-left">
                    <ul>
                        <li><a class="btn-floating btn-sm rgba-white-slight mr-xl-4"><i class="fa fa-facebook"></i></a></li>
                        <li><a class="btn-floating btn-sm rgba-white-slight mr-xl-4"><i class="fa fa-google-plus"></i></a></li>
                        <li><a class="btn-floating btn-sm rgba-white-slight mr-xl-4"><i class="fa fa-linkedin"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
@endsection

