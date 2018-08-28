<nav class="navbar navbar-expand-lg navbar-light bg-light navbar-static-top">
    <div class="container">
        <a class="navbar-brand" href="{{url('/')}}">LaraBBS</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#app-navbar-collapse">
            &#9776;
        </button>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('root')}}">主页 <span class="sr-only">(current)</span></a>
                </li>
                {{--<li class="nav-item">--}}
                    {{--<a class="nav-link" href="#">Features</a>--}}
                {{--</li>--}}
                {{--<li class="nav-item">--}}
                    {{--<a class="nav-link" href="#">Pricing</a>--}}
                {{--</li>--}}
                {{--<li class="nav-item">--}}
                    {{--<a class="nav-link" href="#">About</a>--}}
                {{--</li>--}}
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav navbar-user">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href={{route('login')}}>登录</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('register')}}">注册</a>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="userDetailsDropdownMenu" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false" data-offset="10,20">
                            <img src="{{Auth::user()->avatar}}"
                                 class="avatar-thumbnail" width="30px" height="30px">
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDetailsDropdownMenu">
                            <a class="dropdown-item"
                               href="{{route('users.show', \Illuminate\Support\Facades\Auth::id())}}">我的主页</a>
                            <a class="dropdown-item" href="#">设置</a>
                            <a class="dropdown-item" href="{{route('logout')}}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">退出登录</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>