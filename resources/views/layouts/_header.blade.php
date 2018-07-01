<nav class="navbar navbar-expand-md navbar-light navbar-static-top">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item"><a class="nav-link {{ active_class(if_route('topics.index')) }}" href="{{ route('topics.index') }}">话题</a></li>
                <li class="nav-item"><a class="nav-link {{ active_class((if_route('categories.show') && if_route_param('category', 1))) }}" href="{{ route('categories.show', 1) }}">分享</a></li>
                <li class="nav-item"><a class="nav-link {{ active_class((if_route('categories.show') && if_route_param('category', 2))) }}" href="{{ route('categories.show', 2) }}">教程</a></li>
                <li class="nav-item"><a class="nav-link {{ active_class((if_route('categories.show') && if_route_param('category', 3))) }}" href="{{ route('categories.show', 3) }}">问答</a></li>
                <li class="nav-item"><a class="nav-link {{ active_class((if_route('categories.show') && if_route_param('category', 4))) }}" href="{{ route('categories.show', 4) }}">公告</a></li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <img class="img-responsive img-circle" src="{{ Auth::user()->avatar }}" height="30px" width="30px">{{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('users.show', Auth::id()) }}">个人中心</a>
                            <a class="dropdown-item" href="{{ route('users.edit', Auth::id()) }}">编辑资料</a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>