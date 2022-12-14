<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'MyHobbies')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'MyHobbies') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        @auth
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('home') ? 'active' : '' }}" href="{{ url('/home') }}">{{ __('Home') }}</a>
                            </li>
                        @endauth
                        @guest
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="{{ url('/') }}">{{ __('Startseite') }}</a>
                            </li>
                        @endguest
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('hobby*') ? 'active' : '' }}" href="{{ route('hobby.index') }}">{{ __('Hobbies') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('tag') ? 'active' : '' }}" href="{{ url('/tag') }}">{{ __('Tags') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('info') ? 'active' : '' }}" href="{{ url('/info') }}">{{ __('Infos') }}</a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
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
        </nav>

        <main class="py-4">
            @if ($errors->any())
            <div class="container">
                <div class="alert alert-danger">
                    <ul class="list-group list-group-flush">
                        @foreach ($errors->all() as $error)
                            <li class="list-group-item list-group-item-danger">{!! $error !!}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            @endif
            @isset ($success)
            <div class="container">
                <div class="alert alert-success">
                    <ul class="list-group list-group-flush">
                            <li class="list-group-item list-group-item-success">{!!$success!!}</li>
                    </ul>
                </div>
            </div>
            @endisset
            @isset ($info)
            <div class="container">
                <div class="alert alert-warning">
                    <ul class="list-group list-group-flush">
                            <li class="list-group-item list-group-item-warning">{!!$info!!}</li>
                    </ul>
                </div>
            </div>
            @endisset
            @yield('content')
        </main>
    </div>
</body>
</html>
