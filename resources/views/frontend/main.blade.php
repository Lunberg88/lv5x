@extends('index')
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
                    <a class="nav-link scroll waves-effect waves-light" href="#"> Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link scroll effect waves-effect waves-light" href="#about" data-speed="1200"> About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link scroll waves-effect waves-light" href="#contact"> Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link waves-effect waves-light" href="#"> Openings</a>
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
            <!--<li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle waves-effect waves-light" id="navbarDropdownMenuLink-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i> Profile </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-cyan" aria-labelledby="navbarDropdownMenuLink-4">
                    <a class="dropdown-item waves-effect waves-light hover-darken" href="#">My account</a>
                    <a class="dropdown-item waves-effect waves-light hover-darken" href="#">Log out</a>
                </div>
            </li>-->
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
<div class="container container-fluid">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12">
            <h2 id="about" class="text-center h1 my-5 section-title">
                <span>about me</span>
            </h2>
        </div>
        <section class="section-about">
            <span class="about-btns">
                <a class="btn btn-info waves-effect waves-light"><b>upload cv</b></a>
                <a class="btn btn-danger waves-effect waves-light scroll" href="#contact" data-speed="1600"><b>contact me</b></a>
            </span>
            <p class="px-5 mb-5 pb-3 lead grey-text text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
                aliqua. Ut enim ad minim veniam.</p>
        </section>
        <!--
        <section class="section-about-graph">
            <div class="row">
                <div class="col-md-4">
                    <div class="info info-hover">
                        <div class="icon icon-success icon-circle">
                            <i class="now-ui-icons objects_globe"></i>
                        </div>
                        <h4 class="info-title">Asset Management</h4>
                        <p class="description">Cross-account dashboards provide sophisticated reporting for enterprise.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="info info-hover">
                        <div class="icon icon-info icon-circle">
                            <i class="now-ui-icons education_atom"></i>
                        </div>
                        <h4 class="info-title">Resource Utilization</h4>
                        <p class="description">CloudCheckr provides summary and detailed usage statistics for resources.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="info info-hover">
                        <div class="icon icon-primary icon-circle">
                            <i class="now-ui-icons tech_watch-time"></i>
                        </div>
                        <h4 class="info-title">Self-Healing</h4>
                        <p class="description">CloudCheckr enables users to save money, time, and effort.</p>
                    </div>
                </div>
            </div>
        </section>
        -->
    </div>
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12">
            <h2 class="text-center h1 py-5 section-title"><span>new openings</span></h2>
        </div>
        <div class="col-12 col-sm-12 col-md-4">
            <div class="card card-cascade narrower mb-r hp-card">
                <div class="view overlay hm-white-slight">
                    <img src="img/opn1_1.png" class="img-fluid hp-img" alt="placeholder image with fruits" width="325" height="180">
                    <a>
                        <div class="mask waves-effect waves-light"></div>
                    </a>
                </div>
                <div class="card-body hp-opening-card">
                    <h7 class="blue-text opening-tags">JAVA, Developer</h7>
                    <h4 class="card-title"><a href="#">Cheat day inspirations</a></h4>
                    <p class="card-text">Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut
                        aliquid ex ea commodi.</p>
                    <a class="btn btn-success waves-effect waves-light">Button</a>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-4">
            <div class="card card-cascade narrower mb-r hp-card">
                <div class="view overlay hm-white-slight">
                    <img src="img/opn2_2.jpeg" class="img-fluid hp-img" alt="placeholder image with fruits" width="325" height="180">
                    <a>
                        <div class="mask waves-effect waves-light"></div>
                    </a>
                </div>
                <div class="card-body hp-opening-card">
                    <h7 class="blue-text opening-tags">JavaScript, AngularJS, ReactJS</h7>
                    <h4 class="card-title"><a href="#">Cheat day inspirations</a></h4>
                    <p class="card-text">Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut
                        aliquid ex ea commodi.</p>
                    <a class="btn btn-success waves-effect waves-light">Button</a>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-4">
            <div class="card card-cascade narrower mb-r hp-card">
                <div class="view overlay hm-white-slight">
                    <img src="img/opn4_4.jpeg" class="img-fluid hp-img" alt="placeholder image with fruits" width="325" height="180">
                    <a>
                        <div class="mask waves-effect waves-light"></div>
                    </a>
                </div>
                <div class="card-body hp-opening-card">
                    <h7 class="blue-text opening-tags">EmberJS, TypeScript</h7>
                    <h4 class="card-title"><a href="#">Cheat day inspirations</a></h4>
                    <p class="card-text">Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut
                        aliquid ex ea commodi.</p>
                    <a class="btn btn-success waves-effect waves-light">Button</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12">
            <h2 id="contact" class="text-center h1 py-5 section-title contact-form"><span>contact form</span></h2>
        </div>
        <div class="col-12 col-sm-12 offset-md-1 col-md-10">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12">
                    <div class="card card-cascade narrower mb-r hp-card-form">
                        <form class="hp-form">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="md-form">
                                        <div class="md-form">
                                            <input type="text" id="contact-name" class="form-control">
                                            <label for="contact-name" class="">Your name</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="md-form">
                                        <div class="md-form">
                                            <input type="text" id="contact-email" class="form-control">
                                            <label for="contact-email" class="">Your email</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="md-form">
                                        <textarea type="text" id="contact-message" rows="10" class="md-textarea"></textarea>
                                        <label for="contact-message">Your message</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="center-on-small-only">
                                        <button class="btn btn-primary waves-effect waves-light">Send
                                            <i class="fa fa-send ml-2"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<footer class="page-footer stylish-color-dark">
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