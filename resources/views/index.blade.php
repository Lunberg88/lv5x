<!DOCTYPE html>
<html lang="en" @if($_SERVER['REQUEST_URI'] == "/login") class="full-height" @endif>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Recruiteriia @yield('title')</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:200,400,700|Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/core-md.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="canonical" href="http://recruiter-iia.net<?php echo $_SERVER['REQUEST_URI']; ?>" />
    @yield('css-links')
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
<script type="text/javascript" src="/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="/js/popper.min.js"></script>
<script type="text/javascript" src="/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/js/mdb.min.js"></script>
<script type="text/javascript" src="/js/scroll.js"></script>
<script type="text/javascript" src="/js/share.js"></script>
<script type="text/javascript" src="/js/toastr.min.js"></script>
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
<script type="text/javascript" src="/js/custom.js"></script>
<script>
    new WOW().init();
</script>
<!-- //-->
</body>
</html>
