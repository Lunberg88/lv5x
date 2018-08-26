<nav class="navbar-custom">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span> </button>
            <a class="navbar-brand" href="index-2.html">
                <span class="glyphicon glyphicon-equalizer" aria-hidden="true"></span>Iya Web-HR</a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#home" class="scroll active" data-speed="800">HOME</a></li>
                <li><a href="#about" class="scroll" data-speed="1000">ABOUT</a></li>
                <!--<li><a href="#services" class="scroll" data-speed="1400">SERVICES</a></li>
                <li><a href="#work" class="scroll" data-speed="1400">WORK</a></li>-->
                <li><a href="#news" class="scroll" data-speed="1600">JOBS</a></li>
                <li><a href="#contact" class="scroll" data-speed="1800">CONTACT</a></li>
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}"><i class="fa fa-sign-in" aria-hidden="true"></i> LOGIN</a></li>
                    <li><a href="{{ url('/register') }}"><i class="fa fa-user-plus" aria-hidden="true"></i> REGISTER</a></li>
                @else
                <li>
                    <a href="{{ url('/logout') }}"
                       onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                        <i class="fa fa-sign-out" aria-hidden="true"></i> LOGOUT @if($user)
                        ({{$user->name}})
                        @endif
                    </a>

                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
                @endif
            </ul>
        </div>
    </div>
</nav>