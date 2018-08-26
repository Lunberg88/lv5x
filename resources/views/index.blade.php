<!DOCTYPE html>
<html lang="en" @if($_SERVER['REQUEST_URI'] == "/login" || $_SERVER['REQUEST_URI'] == '/register') class="full-height" @endif>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="@yield('og-description')">
    <meta name="image" content="{{asset('css/ri_logo_web.jpg')}}">
    <meta itemprop="name" content="Recruiteriia">
    <meta itemprop="description" content="@yield('og-description')">
    <meta itemprop="image" content="{{asset('css/ri_logo_web.jpg')}}">
    <meta name="og:title" content="Recruiteriia">
    <meta name="og:description" content="@yield('og-description')">
    <meta name="og:image" content="{{asset('css/ri_logo_web.jpg')}}">
    <meta name="og:url" content="https://recruiteriia.com">
    <meta name="og:site_name" content="Recruiteriia">
    <meta name="og:type" content="website">
    <meta name="twitter:title" content="Recruiteriia">
    <meta name="twitter:description" content="@yield('og-description')">
    <meta name="twitter:image" content="{{asset('css/ri_logo_web.jpg')}}">
    <title>Recruiteriia @yield('title')</title>
    <link rel="shortcut icon" href="{{asset('css/favicon.ico')}}" type="image/x-icon">
    <link rel="icon" href="{{asset('css/favicon.ico')}}" type="image/x-icon">
    <link rel="icon" href="{{asset('css/favicon_32.png')}}" sizes="32x32" />
    <link rel="icon" href="{{asset('css/favicon_192.png')}}" sizes="192x192" />
    <link rel="apple-touch-icon-precomposed" href="{{asset('css/favicon_180.png')}}" />
    <link href="https://fonts.googleapis.com/css?family=Montserrat:200,400,700|Roboto:300,400,500,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800&amp;subset=cyrillic" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/core.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <link rel="canonical" href="http://recruiteriia.com<?php echo $_SERVER['REQUEST_URI']; ?>" />
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
                },1000);
        };
    </script>
</head>
<body class="fixed-sn white-skin">
<div class="preloader-con">
    <div class="preloader center">
        <span class="ball"></span>
        <span class="ball"></span>
        <span class="ball"></span>
    </div>
</div>
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
