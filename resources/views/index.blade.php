<!DOCTYPE html>
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
@if($days !== false)
    <img src="http://theartmad.com/wp-content/uploads/2015/10/Transparent-Halloween-Clip-Art7.png" alt="" class="hollyday-datel">
@endif
<a href="#home" class="scroll scroll-up costum-bg effect response" data-speed="1600">
    <i class="fa fa-chevron-up"></i>
</a>
<header class="nav-wrapper effect">
    @include('index.menu.menu')
</header>
<section id="home" class="home-2">
    <div class="container">
        @include('index.section.home')
    </div>
</section>
<section id="about" class="section">
    <div class="container">
        <div class="row">
            @include('index.section.about')
        </div>
    </div>
</section>
<!--
<section id="services" class="section bg-lightgray">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="title-box text-center">
                    <h2>My Services</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elitsed ation Lorem ipsum
                        <br>dolor sit amet.Veniam quis notru exercit.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="single-service text-center effect">
                    <i class="fa fa-code effect"></i>
                    <h4>WEB DEVELOPMENT</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc aliquam justo et nibh venenatis.</p>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="single-service text-center effect">
                    <i class="fa fa-paint-brush effect"></i>
                    <h4>WEB DESIGN</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc aliquam justo et nibh venenatis.</p>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="single-service text-center effect">
                    <i class="fa fa-laptop effect"></i>
                    <h4>Responsive Desgin</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc aliquam justo et nibh venenatis.</p>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="single-service text-center effect">
                    <i class="fa fa-line-chart effect"></i>
                    <h4>INTERNET MARKETING</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc aliquam justo et nibh venenatis.</p>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12"> <div class="single-service text-center effect"> <i class="fa fa-pencil effect"></i>
                    <h4>WELL DOCUMENTED</h4> <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc aliquam justo et nibh venenatis.</p>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="single-service text-center effect">
                    <i class="fa fa-mobile effect"></i>
                    <h4>APP DEVELOPMENT</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc aliquam justo et nibh venenatis.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="work" class="section">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="title-box text-center">
                    <h2>My Recent Work</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elitsed ation Lorem ipsum <br>dolor sit amet.Veniam quis notru exercit.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <ul id="work-list" class="text-center">
                    <li class="effect active-item">
                        <a href="#" data-filter="all" class="filter filter-active">all</a>
                    </li>
                    <li class="effect">
                        <a href="#" data-filter="development" class="filter">development</a></li>
                    <li class="effect">
                        <a href="#" data-filter="web-design" class="filter">web-design</a></li>
                    <li class="effect">
                        <a href="#" data-filter="graphic-design" class="filter">Graphics-design</a></li>
                    <li class="effect">
                        <a href="#" data-filter="photography" class="filter">Photography</a></li>
                </ul>
            </div>
        </div>
        <div class="row portfolio-content-items">
            <div class="col-xs-6 col-md-3 portfolio-item-con development effect">
                <div class="portfolio-item">
                    <img src="main-theme/img/p-1.jpg" alt="portfolio1" class="effect">
                    <div class="pf-overlay effect">
                        <a href="#" class="center effect" data-toggle="modal" data-target="#portfolio-1">
                            <i class="fa fa-link"></i>
                        </a> <div class="corner-top">
                        </div>
                        <div class="corner-bottom">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-md-3 portfolio-item-con web-design effect">
                <div class="portfolio-item">
                    <img src="main-theme/img/p-2.jpg" alt="portfolio2" class="effect">
                    <div class="pf-overlay effect">
                        <a href="#" class="center effect" data-toggle="modal" data-target="#portfolio-2">
                            <i class="fa fa-link"></i>
                        </a>
                        <div class="corner-top"></div>
                        <div class="corner-bottom"></div>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-md-3 portfolio-item-con graphic-design effect">
                <div class="portfolio-item">
                    <img src="main-theme/img/p-3.jpg" alt="portfolio3" class="effect">
                    <div class="pf-overlay effect">
                        <a href="#" class="center effect" data-toggle="modal" data-target="#portfolio-3">
                            <i class="fa fa-link"></i>
                        </a>
                        <div class="corner-top"></div>
                        <div class="corner-bottom"></div>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-md-3 portfolio-item-con photography effect">
                <div class="portfolio-item">
                    <img src="main-theme/img/p-4.jpg" alt="portfolio4" class="effect">
                    <div class="pf-overlay effect">
                        <a href="#" class="center effect" data-toggle="modal" data-target="#portfolio-4">
                            <i class="fa fa-link"></i>
                        </a>
                        <div class="corner-top"></div>
                        <div class="corner-bottom"></div>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-md-3 portfolio-item-con development effect">
                <div class="portfolio-item">
                    <img src="main-theme/img/p-5.jpg" alt="portfolio5" class="effect">
                    <div class="pf-overlay effect">
                        <a href="#" class="center effect" data-toggle="modal" data-target="#portfolio-5">
                            <i class="fa fa-link"></i>
                        </a>
                        <div class="corner-top"></div>
                        <div class="corner-bottom"></div>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-md-3 portfolio-item-con web-design effect">
                <div class="portfolio-item">
                    <img src="main-theme/img/p-6.jpg" alt="portfolio6" class="effect">
                    <div class="pf-overlay effect">
                        <a href="#" class="center effect" data-toggle="modal" data-target="#portfolio-6">
                            <i class="fa fa-link"></i>
                        </a>
                        <div class="corner-top"></div>
                        <div class="corner-bottom"></div>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-md-3 portfolio-item-con graphic-design effect">
                <div class="portfolio-item">
                    <img src="main-theme/img/p-7.jpg" alt="portfolio7" class="effect">
                    <div class="pf-overlay effect">
                        <a href="#" class="center effect" data-toggle="modal" data-target="#portfolio-7">
                            <i class="fa fa-link"></i>
                        </a>
                        <div class="corner-top"></div>
                        <div class="corner-bottom"></div>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-md-3 portfolio-item-con development effect">
                <div class="portfolio-item">
                    <img src="main-theme/img/p-8.jpg" alt="portfolio8" class="effect">
                    <div class="pf-overlay effect">
                        <a href="#" class="center effect" data-toggle="modal" data-target="#portfolio-8">
                            <i class="fa fa-link"></i>
                        </a>
                        <div class="corner-top"></div>
                        <div class="corner-bottom"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
-->
<section id="news" class="section bg-lightgray">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="title-box text-center">
                    <h2>The New Openings</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elitsed ation Lorem ipsum
                        <br>dolor sit amet.Veniam quis notru exercit.</p>
                </div>
            </div>
        </div>
        <div class="row">
            @include('index.section.openings_main')
        </div>
    </div>
</section>
<section id="contact" class="section">
    <div class="container">
        @include('index.section.contact')
    </div>
</section>
@include('index.section.footer')
</body>
</html>