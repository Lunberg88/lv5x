<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="Offering a full range of recruitment services, we competently deal with all issues in the field of human resources management, which allows our clients to focus on their core businesses.">
    <meta name="keywords" content="recruiteriia, recruitment, hunting, hiring, web, it, hire, remote, job, relocate, vacancy, work, remote job, work remotely, middle, senior, junior, html, css, js, javascript, java, react, reactjs, angular, angularJs, angular 2, angular 5, angular 6, ruby, ruby on rails, python, devops, vue, vueJs, coffeeScript, typescript, nodejs, node js, designer, designer 3d, game, game-dev, game dev, gamedev, gambling, php, mysql, sql, c, c++, c#, .net, asp.net, project manager, product manager, sales manager, sales force, aws, qa, tdd, bdd, unitTest, unity, unreal, android, ios, mobile, accounting, business analyst, ит, веб, работа удаленно, вакансии, разработчики, поиск разработчиков, рекрутинг">
    <meta name="copyright" content="Recruiteriia © 2018">
    <meta name="robots" content="INDEX,FOLLOW">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="@yield('og-description')">
    <meta name="image" content="@yield('main-image', asset('css/ri_logo_web.jpg'))">
    <meta itemprop="name" content="Recruiteriia">
    <meta itemprop="description" content="@yield('og-description')">
    <meta itemprop="image" content="@yield('itemprop-image', asset('css/ri_logo_web.jpg'))">
    <meta name="og:title" content="Recruiteriia">
    <meta name="og:description" content="@yield('og-description')">
    <meta name="og:image" content="@yield('og:image', asset('css/ri_logo_web.jpg'))">
    <meta name="og:url" content="{{config('app.url')}}<?php echo $_SERVER['REQUEST_URI']; ?>">
    <meta name="og:site_name" content="Recruiteriia">
    <meta name="og:type" content="website">
    <meta name="twitter:title" content="Recruiteriia">
    <meta name="twitter:description" content="@yield('og-description')">
    <meta name="twitter:image" content="@yield('twitter:image', asset('css/ri_logo_web.jpg'))">
    <title>Recruiteriia @yield('title')</title>
    <link rel="shortcut icon" href="{{asset('css/favicon.ico')}}" type="image/x-icon">
    <link rel="icon" href="{{asset('css/favicon_32.png')}}" sizes="32x32" />
    <link rel="icon" href="{{asset('css/favicon_192.png')}}" sizes="192x192" />
    <link rel="apple-touch-icon-precomposed" href="{{asset('css/favicon_180.png')}}" />
    <link href="https://fonts.googleapis.com/css?family=Montserrat:200,400,700|Roboto:300,400,500,700" rel="stylesheet" media="none" onload="if(media!='all')media='all'">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800&amp;subset=cyrillic" rel="stylesheet" media="none" onload="if(media!='all')media='all'">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" media="none" onload="if(media!='all')media='all'">
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" media="none" onload="if(media!='all')media='all'">
    <link href="{{asset('css/core.min.css')}}" rel="stylesheet" media="none" onload="if(media!='all')media='all'">
    <link href="{{asset('css/style.css')}}" rel="stylesheet" media="none" onload="if(media!='all')media='all'">
    <link rel="canonical" href="{{config('app.url')}}<?php echo $_SERVER['REQUEST_URI']; ?>" />
    @yield('css-links')
    <style type="text/css">
        #preloader>p{
            display:none;
        }
        #preloader_preload{
            display: block;
            position: fixed;
            z-index: 99999;
            color: #0f0d1a;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            min-width: 1000px;
            background: #ffffff url({{asset('img/svg')}}/ball-triangle.svg) center center no-repeat;
            background-size:41px;
        }</style>
    <div id="preloader">
        <div id="preloader_preload"></div>
    </div>
    <script type="text/javascript">
        var preloader = document.getElementById("preloader_preload");
        function fadeOutnojquery(el){
            el.style.opacity = 1;
        var interpreloader = setInterval(function(){
            el.style.opacity = el.style.opacity - 0.05;
            if (el.style.opacity <=0.05){
                clearInterval(interpreloader);
                preloader.style.display = "none";
            }
        },16);
        }
        window.onload = function(){
            setTimeout(function(){
                fadeOutnojquery(preloader);
                },500);
        };
    </script>
</head>
<body class="fixed-sn white-skin">
<a href="#home" class="scroll scroll-up costum-bg effect response" data-speed="1800">
    <i class="fa fa-chevron-up"></i>
</a>
@yield('content')
<!-- JS -->
<script type="text/javascript" src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/popper.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/core.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/scroll.js')}}"></script>
<script type="text/javascript" src="{{asset('js/share.js')}}"></script>
<script type="text/javascript" src="{{asset('js/toastr.min.js')}}"></script>
<script>
    @if(Session::has('message'))
    var type = "{{ Session::get('alert-type', 'info') }}";
    switch(type){
        case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;

        case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;

        case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;

        case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
    }
    @endif
</script>
<script type="text/javascript" src="{{asset('js/custom.js')}}"></script>
<script>
    new WOW().init();
</script>
<script>
    $(function() {
        $('.mdb-select').material_select();
    });
</script>
<!-- //-->
</body>
</html>
