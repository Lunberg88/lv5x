@extends('index')
@section('css-links')
    @parent
    <style>
        .intro-2 {
            background: url("{{asset('/images/main_logo2.jpg')}}")no-repeat center center;
            background-size: cover;
        }
        .card {
            background-color: rgba(229, 228, 255, 0.2);
            width: 100%;
        }

        .btn-header-info {
            background: #4abde8 !important;
        }
        .btn-header-info h3 {
            color: #fff !important;
        }
        .md-form .prefix {
            font-size: 1.5rem;
            margin-top: 1rem;
        }
        .md-form label {
            color: #ffffff;
        }
        h6 {
            line-height: 1.7;
        }

        .card {
            margin-top: 30px;
        }

        .md-form input[type=email]:focus:not([readonly]),
        .md-form input[type=password]:focus:not([readonly]),
        .md-form input[type=text]:focus:not([readonly]) {
            border-bottom: 1px solid #8EDEF8;
            box-shadow: 0 1px 0 0 #8EDEF8;
        }
        .md-form input[type=email]:focus:not([readonly])+label,
        .md-form input[type=password]:focus:not([readonly])+label,
        .md-form input[type=text]:focus:not([readonly])+label {
            color: #8EDEF8;
        }

        .md-form .form-control {
            color: #fff;
        }
        .white-skin input[type=checkbox]:checked+label:before {
            border-right: 2px solid #8EDEF8 !important;
            border-bottom: 2px solid #8EDEF8 !important;
        }

        [type=checkbox]+label:before {
            border: 1.5px solid #383838 !important;
        }
        [type=checkbox]:checked+label:before {
            border-color: transparent #8EDEF8 #8EDEF8 transparent !important;
        }
    </style>
@endsection
@section('content')
@yield('content')
@endsection