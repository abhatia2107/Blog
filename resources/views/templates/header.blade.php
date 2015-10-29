@section("header")
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{url('/')}}">Blog</a>
            </div>

            <div class="collapse navbar-collapse" id="navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    @if ((Auth::check())&&(Auth::user()->level==1))
                        <li><a href="{{ url('/user') }}">Users</a></li>
                    @endif

                    @if ((Auth::check())&&(Auth::user()->level<3))
                        <li><a href="{{ url('/blog/create') }}">Write a blog</a></li>
                    @endif

                    <li><a href="{{ url('/about') }}">About Us</a></li>

                    @if(Auth::check())
                        <li><a href="{{ url('/blog') }}">Blog</a></li>
                    @endif

                    @if (Auth::guest())
                        <li><a href="{{ url('/auth/login') }}">Login</a></li>
                        <li><a href="{{ url('/auth/register') }}">Register</a></li>
                    @else
                        <li><a href="{{'/user/'.Auth::id()}}">{{ Auth::user()->name }}</a></li>
                        <li><a href="{{ url('/auth/logout') }}">Logout</a></li>
                    @endif
                </ul>
            </div>

        </div><!-- /.container-fluid -->
    </nav>
@show