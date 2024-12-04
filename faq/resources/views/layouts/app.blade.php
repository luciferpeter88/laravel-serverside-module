<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<x-head-tag />
<body class="dark text-bodydark bg-boxdark-2" >
    <div id="app" >
        <nav class="navbar navbar-expand-md navbar-light bg-[rgb(36,48,63)] shadow-sm min-h-20 ">
            <div class="container">
                <!-- Brand -->
                <a class="navbar-brand fw-bold text-white" href="{{ url('/') }}">
                    Laravel Q&A Platform
                </a>
                <!-- Toggle Button for Mobile View -->
                <button class="navbar-toggler bg-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon "></span>
                </button>
        
                <!-- Navbar Content -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent" >
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto"></ul>
        
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto ">
                        {{-- global helper function --}}
                        @if(auth()->check())
                            <li class="nav-item">
                                @if (auth()->user()->role == 'admin')
                                    <a href="{{ route('dashboard.allpost') }}" class="nav-link text-white" style="visibility: visible">Dashboard</a>
                                @elseif (auth()->user()->role == 'user')
                                    <a href="{{ route('dashboard.posts') }}" class="nav-link text-white" style="visibility: visible">Dashboard</a>
                                @else
                                    <a href="{{ route('dashboard.allaregisteredmembers') }}" class="nav-link text-white" style="visibility: visible">Dashboard</a>
                                @endif
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('logout') }}" class="nav-link text-danger" style="visibility: visible"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                   Logout
                                </a>
                            </li>
                            <!-- Logout Form -->
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        @else
                            <!-- Guest -->
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link text-white" style="visibility: visible" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link text-white" style="visibility: visible" href="{{ route('register') }}">{{ __('Register') }}</a>
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
