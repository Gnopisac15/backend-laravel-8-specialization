<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{('FoodShare') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="../../resources/css/app.css" rel="stylesheet">
</head>

<style>
    .navbar-sticky-top
    {
        position: fixed;
        z-index: 999;
        opacity:1;
        width: 100%;
    }
</style>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light shadow-sm pt-2 navbar-sticky-top">
            <div class="container">
                <div class="d-flex">
                    <img src="img/share.png" alt="" class="rounded-circle w-100 bg-white" style="max-width:50px; max-height:50px;">
                    <a class="navbar-brand border-left border-dark ml-2 pl-2 " href="{{ url('/') }}">
                
                        <strong class="h3 mt-5">{{('FoodShare') }}</strong>
                    </a>
                </div>
            <div class="row">
                @if(Auth::check())
                <div class="pr-3" style="height:45px; border-right: 1px solid #333">
                    <form action="{{ URL('/search')}}" type="get" class="form-inline my-lg-0 pt-2">
                        <input type="search" name="query" class="form-control mr-sm-2" placeholder="Search here">
                        <button class="btn hover1 pr-5 btn-dark">Search</button>
                        </input>
                    </form>
                </div>
                @endif
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse pl-3" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }} " >
                                        <button class="btn btn-sm pr-4 pl-4 btn-outline-dark">
                                            {{ __('Login') }}
                                        </button>
                                    </a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">
                                    <button class="btn btn-sm pr-4 pl-4 btn-dark hover1 text-white ">
                                            {{ __('Register') }}
                                        </button>
                                    </a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown ">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->username }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right color1" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/">
                                        {{ __('Home') }}
                                    </a>
                                    <a class="dropdown-item" href="/profile/{{Auth::user()->id }}">
                                        {{ __('Profile') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
                </div>
            </div>
        </nav>
        <br>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
