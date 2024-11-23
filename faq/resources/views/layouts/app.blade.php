<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <!-- Brand -->
                <a class="navbar-brand fw-bold text-gray-700" href="{{ url('/') }}">
                    Laravel Q&A Platform
                </a>
        
                <!-- Toggle Button for Mobile View -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
        
                <!-- Navbar Content -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto"></ul>
        
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        @if(auth()->check())
                            <!-- Bejelentkezett Felhasználók -->
                            <li class="nav-item">
                                <a href="{{ route('questions.create') }}" class="nav-link text-gray-700">Új kérdés</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('profile.show', auth()->user()->id) }}" class="nav-link text-gray-700">Profil</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('logout') }}" class="nav-link text-danger"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Kijelentkezés
                                </a>
                            </li>
                            <!-- Kijelentkezési Form -->
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        @else
                            <!-- Vendégek -->
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link text-gray-700" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link text-gray-700" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
