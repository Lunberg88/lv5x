<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="canonical" href="http://iya-webhr.site" />
    <title>Iya Web-HR :: Dashboard</title>
    <!-- Bootstrap core CSS     -->
    <link rel="stylesheet" href="/css/app.css">
    <link href="/dashboard/assets/css/bootstrap.min.css" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="/dashboard/assets/css/material-dashboard.css?v=1.2.0" rel="stylesheet" />
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="/dashboard/assets/css/demo.css" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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
<div class="wrapper">
    <div class="sidebar" data-active-color="rose" data-background-color="black" data-image="/dashboard/assets/img/sidebar-2.jpg">
        <div class="logo">
            <a href="http://www.creative-tim.com" class="simple-text logo-mini">
                CT
            </a>
            <a href="http://www.creative-tim.com" class="simple-text logo-normal">
                Creative Tim
            </a>
        </div>
        <div class="sidebar-wrapper">
            <div class="user">
                <div class="photo">
                    <img src="/dashboard/assets/img/faces/avatar.jpg" />
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
                                <a href="#">
                                    <span class="sidebar-mini">MP</span>
                                    <span class="sidebar-normal">My Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="sidebar-mini">EP</span>
                                    <span class="sidebar-normal">Edit Profile</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <ul class="nav">
                <li class="active">
                    <a href="{{route('admin.index')}}">
                        <i class="material-icons">dashboard</i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li>
                    <a data-toggle="collapse" href="#pagesExamples">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <p>Candidates
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse" id="pagesExamples">
                        <ul class="nav">
                            <li>
                                <a href="{{route('admin.candidates')}}">
                                    <span class="sidebar-mini">&nbsp;</span>
                                    <span class="sidebar-normal"><i class="fa fa-users" aria-hidden="true"></i> Show all</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('admin.candidates.create')}}">
                                    <span class="sidebar-mini">&nbsp;</span>
                                    <span class="sidebar-normal"><i class="fa fa-user-plus" aria-hidden="true"></i> Add new</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a data-toggle="collapse" href="#formsExamples">
                        <i class="material-icons">content_paste</i>
                        <p>Openings
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse" id="formsExamples">
                        <ul class="nav">
                            <li>
                                <a href="{{route('admin.openings')}}">
                                    <span class="sidebar-mini">&nbsp;</span>
                                    <span class="sidebar-normal"><i class="fa fa-list-alt" aria-hidden="true"></i> Openings list</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('admin.openings.create')}}">
                                    <span class="sidebar-mini">&nbsp;</span>
                                    <span class="sidebar-normal"><i class="fa fa-file-text" aria-hidden="true"></i> Add opening</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a data-toggle="collapse" href="#blogsSection">
                        <i class="fa fa-file-text"></i>
                        <p>Blog
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse" id="blogsSection">
                        <ul class="nav">
                            <li>
                                <a href="{{route('admin.blog.dashboard')}}">
                                    <span class="sidebar-mini">&nbsp;</span>
                                    <span class="sidebar-normal">
                                        <i class="fa fa-newspaper-o" aria-hidden="true"></i> News list
                                    </span>
                                </a>
                            </li>
                            <li>
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
            </ul>
        </div>
    </div>
    <div class="main-panel">
        <nav class="navbar navbar-transparent navbar-absolute">
            <div class="container-fluid">
                <div class="navbar-minimize">
                    <button id="minimizeSidebar" class="btn btn-round btn-white btn-fill btn-just-icon">
                        <i class="material-icons visible-on-sidebar-regular">more_vert</i>
                        <i class="material-icons visible-on-sidebar-mini">view_list</i>
                    </button>
                </div>
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#"> Dashboard </a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="#pablo" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="material-icons">dashboard</i>
                                <p class="hidden-lg hidden-md">Dashboard</p>
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="material-icons">notifications</i>
                                <span class="notification">5</span>
                                <p class="hidden-lg hidden-md">
                                    Notifications
                                    <b class="caret"></b>
                                </p>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="#">Mike John responded to your email</a>
                                </li>
                                <li>
                                    <a href="#">You have 5 new tasks</a>
                                </li>
                                <li>
                                    <a href="#">You're now friend with Andrew</a>
                                </li>
                                <li>
                                    <a href="#">Another Notification</a>
                                </li>
                                <li>
                                    <a href="#">Another One</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#pablo" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="material-icons">person</i>
                                <p class="hidden-lg hidden-md">Profile</p>
                            </a>
                        </li>
                        <li class="separator hidden-lg hidden-md"></li>
                    </ul>
                    <!--<form class="navbar-form navbar-right" role="search">-->
                    {!! Form::open(['method' => 'GET', 'route' => ['search'], 'class' => 'navbar-form navbar-right']) !!}
                        <div class="form-group form-search is-empty">
                            <input type="text" class="form-control" placeholder="Search">
                            <span class="material-input"></span>
                        </div>
                        <button type="submit" class="btn btn-white btn-round btn-just-icon">
                            <i class="material-icons">search</i>
                            <div class="ripple-container"></div>
                        </button>
                    {!! Form::close() !!}
                    <!--</form>-->
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
<script src="/dashboard/assets/js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="/dashboard/assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="/dashboard/assets/js/material.min.js" type="text/javascript"></script>
<script src="/dashboard/assets/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
<!-- Library for adding dinamically elements -->
<script src="/dashboard/assets/js/arrive.min.js" type="text/javascript"></script>
<!-- Forms Validations Plugin -->
<script src="/dashboard/assets/js/jquery.validate.min.js"></script>
<!-- Promise Library for SweetAlert2 working on IE -->
<script src="/dashboard/assets/js/es6-promise-auto.min.js"></script>
<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
<script src="/dashboard/assets/js/moment.min.js"></script>
<script src="/dashboard/assets/js/jquery.bootstrap-wizard.js"></script>
<!--  Notifications Plugin, full documentation here: http://bootstrap-notify.remabledesigns.com/    -->
<script src="/dashboard/assets/js/bootstrap-notify.js"></script>
<!--   Sharrre Library    -->
<script src="/dashboard/assets/js/jquery.sharrre.js"></script>
<!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
<script src="/dashboard/assets/js/bootstrap-datetimepicker.js"></script>
<script src="/dashboard/assets/js/nouislider.min.js"></script>
<script src="/dashboard/assets/js/jquery.select-bootstrap.js"></script>
<!--  DataTables.net Plugin, full documentation here: https://datatables.net/    -->
<script src="/dashboard/assets/js/jquery.datatables.js"></script>
<!-- Sweet Alert 2 plugin, full documentation here: https://limonte.github.io/sweetalert2/ -->
<script src="/dashboard/assets/js/sweetalert2.js"></script>
<!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="/dashboard/assets/js/jasny-bootstrap.min.js"></script>
<!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
<script src="/dashboard/assets/js/fullcalendar.min.js"></script>
<!-- Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
<script src="/dashboard/assets/js/jquery.tagsinput.js"></script>
<!-- Material Dashboard javascript methods -->
<script src="/dashboard/assets/js/material-dashboard.js?v=1.2.0"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
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
        selector : "textarea",
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
       $('#ref').click(function(e) {
           window.location.reload();
       })
    });
</script>
</html>