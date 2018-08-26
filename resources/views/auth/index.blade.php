<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', ' :: Login')</title>
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('main-theme/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('main-theme/css/style.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:700%7cRaleway:400,700" rel="stylesheet">
    <style type="text/css">
        .login {
            height: 100%;
        }
    </style>
    <!--[if lt IE 9]>
    <script src="{{asset('js/ie/html5shiv.min.js')}}"></script>
    <script src="{{asset('js/ie/respond.min.js')}}"></script>
    <![endif]-->
</head>
<body>
<section class="login">
    @yield('content')
</section>
<script src="{{asset('main-theme/js/jquery.min.js')}}"></script>
<script src="{{asset('main-theme/js/bootstrap.min.js')}}"></script>
</body>
</html>