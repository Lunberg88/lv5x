<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="canonical" href="{{config('app.url')}}<?php echo $_SERVER['REQUEST_URI']; ?>" />
    <title>Recruiter-Iia @yield('title')</title>
    <link href="{{asset('dashboard/assets/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{asset('dashboard/assets/css/ri-core.css')}}" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('dashboard/assets/css/toastr.css')}}">
    <link rel="shortcut icon" href="{{asset('css/favicon.ico')}}" type="image/x-icon">
    <link rel="icon" href="{{asset('css/favicon.ico')}}" type="image/x-icon">
    <link rel="icon" href="{{asset('css/favicon_32.png')}}" sizes="32x32" />
    <link rel="icon" href="{{asset('css/favicon_192.png')}}" sizes="192x192" />
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
        a > i.btn {
            margin: 0 !important;
            padding: 4px 6px !important;
        }
    </style>
    <!--[if lt IE 9]>
    <script src="{{asset('js/ie/html5shiv.min.js')}}"></script>
    <script src="{{asset('js/ie/respond.min.js')}}"></script>
    <![endif]-->
</head>
<body>
<div class="wrapper">
    <div class="sidebar" data-active-color="green" data-background-color="black" data-image="{{asset('dashboard/assets/img/sidebar-2.jpg')}}">
        <div class="logo">
            <a href="{{route('main')}}" class="simple-text logo-mini" target="_blank">
                RI
            </a>
            <a href="{{route('main')}}" class="simple-text logo-normal" target="_blank">
                Recruiteriia
            </a>
        </div>
        <div class="sidebar-wrapper">
            <div class="user">
                <div class="photo">
                    @if(Auth::user()->avatar !== null)
                        <img class="img" src="{{asset('images/avatars/'.Auth::user()->avatar)}}" />
                    @else
                        <img src="{{asset('dashboard/assets/img/placeholder.jpg')}}" />
                    @endif
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                            <span>
                                <b>{{ Auth::user()->name }}</b>
                                <b class="caret"></b>
                            </span>
                    </a>
                    <div class="clearfix"></div>
                    <div class="collapse" id="collapseExample">
                        <ul class="nav">
                            <li>
                                <a href="{{route('admin.profile.index')}}">
                                    <span class="sidebar-mini">MP</span>
                                    <span class="sidebar-normal">My Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('admin.profile.index')}}">
                                    <span class="sidebar-mini">EP</span>
                                    <span class="sidebar-normal">Edit Profile</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <ul class="nav">
                <!-- Homepage -->
                <li @if(request()->path() == 'admin') class="active" @endif>
                    <a href="{{route('admin.index')}}">
                        <i class="material-icons">dashboard</i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <!-- Candidates -->
                <li @if(request()->path() == 'admin/candidates') class="active" @endif>
                    <a data-toggle="collapse" href="#" onclick="window.location.href = '{{route('admin.candidates')}}';" @if(request()->path() == 'admin/candidates') aria-expanded="true" @endif aria-expanded="true">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <p>Candidates
                            @if(count($adminService->notifyNewCandidates()) > 0)
                                <span class="label label-danger label-danger-notifys small-label">{{$adminService->notifyNewCandidates()}}</span>
                            @endif
                        </p>
                    </a>
                    <div class="collapsed" @if(request()->path() == 'admin/candidates') aria-expanded="true" class="collapse in" style="height: auto;" @endif>
                        <ul class="nav">
                            <li @if(request()->path() == 'admin/candidates/new') class="active" @endif>
                                <a href="{{route('admin.candidates.create')}}">
                                    <span class="sidebar-mini">&nbsp;</span>
                                    <span class="sidebar-normal"><i class="fa fa-user-plus" aria-hidden="true"></i> Add new</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <!-- Openings -->
                <li @if(request()->path() == 'admin/openings') class="active" @endif>
                    <a data-toggle="collapse" href="#" onclick="window.location.href = '{{route('admin.openings')}}';">
                        <i class="material-icons">content_paste</i>
                        <p>Openings</p>
                    </a>
                    <div class="collapsed">
                        <ul class="nav">
                            <li @if(request()->path() == 'admin/openings/new') class="active" @endif>
                                <a href="{{route('admin.openings.create')}}">
                                    <span class="sidebar-mini">&nbsp;</span>
                                    <span class="sidebar-normal"><i class="fa fa-file-text" aria-hidden="true"></i> Add opening</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- Opening Offer -->
                <li @if(request()->path() == 'admin/opening_offer') class="active" @endif>
                    <a href="{{route('admin.opening_offer.main')}}">
                        <i class="fa fa-briefcase"></i>
                        <p>Opening offer</p>
                    </a>
                </li>

                <!-- Blog -->
                <li @if(request()->path() == 'admin/blog') class="active" @endif>
                    <a data-toggle="collapse" href="#" onclick="window.location.href = '{{route('admin.blog.dashboard')}}';">
                        <i class="fa fa-file-text"></i>
                        <p>Blog
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapsed">
                        <ul class="nav">
                            <li @if(request()->path() == 'admin/blog/create') class="active" @endif>
                                <a href="{{route('admin.blog.create')}}">
                                    <span class="sidebar-mini">&nbsp;</span>
                                    <span class="sidebar-normal">
                                        <i class="fa fa-file-text" aria-hidden="true"></i> Create news
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- History -->
                <li @if(request()->path() == 'admin/history') class="active" @endif>
                    <a href="{{route('admin.history')}}">
                        <i class="fa fa-history"></i>
                        <p>History</p>
                    </a>
                </li>

                <!-- Messages -->
                <li @if(request()->path() == 'admin/msg') class="active" @endif>
                    <a href="{{route('admin.msg.list')}}">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                        <p>Messages&nbsp;
                            @if(count($adminService->notifyNewMessages()) > 0)
                            <span class="label label-danger label-danger-notifys small-label">{{count($adminService->notifyNewMessages())}}</span>
                            @endif
                        </p>
                    </a>
                </li>

                <!-- Settings -->
                <li @if(request()->path() == 'admin/settings') class="active" @endif>
                    <a href="{{route('admin.settings')}}">
                        <i class="fa fa-cogs" aria-hidden="true"></i>
                        <p>Settings</p>
                    </a>
                </li>

                <li>
                    <a href="{{ url('/logout') }}"
                       onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();" class="logout--link">
                        <i class="fa fa-sign-out" aria-hidden="true"></i>
                        <p><b>LOGOUT ({{ Auth::user()->name }})</b></p>
                    </a>
                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            </ul>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-md-offset-2 col-sm-offset-2 notification-button-devices pull-left">
            </div>
        </div>
    </div>
    <div class="main-panel">

        <nav class="navbar navbar-inverse navbar-fixed-top nav-admin">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Project name</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="#">Action</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-xs-12 col-md-12">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<!--   Core JS Files   -->
<script src="{{asset('dashboard/assets/js/jquery-3.2.1.min.js')}}" type="text/javascript"></script>
<script src="{{asset('dashboard/assets/js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('dashboard/assets/js/material.min.js')}}" type="text/javascript"></script>
<script src="{{asset('dashboard/assets/js/perfect-scrollbar.jquery.min.js')}}" type="text/javascript"></script>
<!-- Library for adding dinamically elements -->
<script src="{{asset('dashboard/assets/js/arrive.min.js')}}" type="text/javascript"></script>
<!-- Forms Validations Plugin -->
<script src="{{asset('dashboard/assets/js/jquery.validate.min.js')}}"></script>
<!-- Promise Library for SweetAlert2 working on IE -->
<script src="{{asset('dashboard/assets/js/es6-promise-auto.min.js')}}"></script>
<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
<script src="{{asset('dashboard/assets/js/moment.min.js')}}"></script>
<script src="{{asset('dashboard/assets/js/jquery.bootstrap-wizard.js')}}"></script>
<!--  Notifications Plugin, full documentation here: http://bootstrap-notify.remabledesigns.com/    -->
<script src="{{asset('dashboard/assets/js/bootstrap-notify.js')}}"></script>
<!--   Sharrre Library    -->
<script src="{{asset('dashboard/assets/js/jquery.sharrre.js')}}"></script>
<!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
<script src="{{asset('dashboard/assets/js/bootstrap-datetimepicker.js')}}"></script>
<script src="{{asset('dashboard/assets/js/nouislider.min.js')}}"></script>
<script src="{{asset('dashboard/assets/js/jquery.select-bootstrap.js')}}"></script>
<!--  DataTables.net Plugin, full documentation here: https://datatables.net/    -->
<script src="{{asset('dashboard/assets/js/jquery.datatables.js')}}"></script>
<!-- Sweet Alert 2 plugin, full documentation here: https://limonte.github.io/sweetalert2/ -->
<script src="{{asset('dashboard/assets/js/sweetalert2.js')}}"></script>
<!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="{{asset('dashboard/assets/js/jasny-bootstrap.min.js')}}"></script>
<!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
<script src="{{asset('dashboard/assets/js/fullcalendar.min.js')}}"></script>
<!-- Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
<script src="{{asset('dashboard/assets/js/jquery.tagsinput.js')}}"></script>
<!-- Material Dashboard javascript methods -->
<script src="{{asset('dashboard/assets/js/material-dashboard.js')}}"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="{{asset('dashboard/assets/js/custom.js')}}"></script>
<script src="{{asset('dashboard/assets/js/toastr.min.js')}}"></script>
<script src="{{asset('dashboard/assets/js/mine.js')}}"></script>
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
<script type="text/javascript">
    $(function() {
        $('#showOrHideCv').click(function() {
            $('#res').toggle('slow');
        });
    });
</script>
<script src="{{asset('js/tinymce/tinymce.min.js')}}"></script>
<script>
    var editor_config = {
        //path_absolute : "{{ URL::to('/') }}/",
        path_absolute: "/",
        //forced_root_block : false,
        statusbar: true,
        selector : "textarea.blog-field",
        resize: true,
        plugins: [
            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime media nonbreaking save table contextmenu directionality",
            "emoticons template paste textcolor colorpicker textpattern"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
        relative_urls: false,
        file_browser_callback : function(field_name, url, type, win) {
            var x = window.innerWidth || document.documentElement.clientWidth || document.getElementByTagName('body')[0].clientWidth;
            var y = window.innerHeight|| document.documentElement.clientHeight|| document.grtElementByTagName('body')[0].clientHeight;
            var cmsURL = editor_config.path_absolute+'laravel-filemanager?field_name'+field_name;
            if (type = 'image') {
                cmsURL = cmsURL+'&type=Images';
            } else {
                cmsUrl = cmsURL+'&type=Files';
            }

            tinyMCE.activeEditor.windowManager.open({
                file : cmsURL,
                title : 'Filemanager',
                width : x * 0.8,
                height : y * 0.8,
                resizeble : 'yes',
                close_previous : 'no'
            });
        }
    };

    tinymce.init(editor_config);
</script>﻿
<script>
    $(function() {
        $('#toggle').css('cursor', 'pointer');
        $('#hide').click(function() {
            $('#toggle').toggle();
        });

        $('div.sidebar-wrapper ul.nav > li div.collapse nav > li').click(function() {
            $('div.sidebar-wrapper ul.nav > li').removeClass('active');
            $(this).addClass('active');
            $()
        });

        $('button[data-original-title="Edit"]').click(function(e) {
            e.preventDefault();
            $('div[data-info="upload_cvs"]').fadeOut('slider');
            $('div[data-info="edit_upload_cvs"]').fadeIn('slider');
            $('div#edit-upload-cvs').removeClass('hidden');
            $('div#edit-upload-cvs').addClass('visible');
            $('div.opening-edit-tbs').addClass('hidden');
        });

        $('button[data-original-title="EditAvatar"]').click(function(e) {
            e.preventDefault();
            $('div[data-info="upload_avatar"]').fadeOut('slider');
            $('div[data-info="edit_upload_avatar"]').fadeIn('slider');
            $('div#edit-upload-avatar').removeClass('hidden');
            $('div#edit-upload-avatar').addClass('visible');
            $('div.profile-edit-tbs').addClass('hidden');
        });

        $('button[data-original-title="Remove"]').click(function() {
            $(this).val('true');
        });

        $('button.close i').click(function(e) {
           e.preventDefault();
           let notif_id = $(this).attr('id');
           $.post('{{route('admin.read.notification')}}', {'uid': notif_id, '_token': $('meta[name="csrf-token"]').attr('content')}).done(function(data) {
               data.status == 'success' ? toastr.info(data.message) : toastr.error(data.message);
           })
           .fail(function() {
               toastr.error('Error while reading notification :/');
           });
        });
    });
</script>
</html>