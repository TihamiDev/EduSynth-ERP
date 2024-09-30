<!doctype html>
<html class="h-100" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <title>{{ config('app.name', 'ERP.') }}</title> --}}
    <title>
        {{ __('ERP.') }}
    </title>

    <link rel="shortcut icon" href="{{asset('favicon_io/favicon-16.png')}}">
    <link rel="shortcut icon" sizes="16x16" href="{{asset('favicon_io/favicon-16.png')}}">
    <link rel="shortcut icon" sizes="32x32" href="{{asset('favicon_io/favicon-32.png')}}">
    <link rel="apple-touch-icon" href="{{asset('favicon_io/favicon-16.png')}}">
    <link rel="icon" href="{{asset('favicon_io/favicon-16.png')}}" sizes="192x192">
    <link rel="icon" href="{{asset('favicon_io/favicon-16.png')}}" sizes="512x512">

    <!-- Scripts -->
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
   
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/fastbootstrap@2.2.0/dist/css/fastbootstrap.min.css" rel="stylesheet" integrity="sha256-V6lu+OdYNKTKTsVFBuQsyIlDiRWiOmtC8VQ8Lzdm2i4=" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/60b80ec33b.js" crossorigin="anonymous"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="h-100">
    <div id="app" class="h-100">
        @auth
        <nav class="navbar sticky-top navbar-expand-md navbar-light bg-white border-btm-e6 justify-content-center">
            <div class="container mx-5">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{-- {{ config('app.name', 'Laravel') }} --}}                    
                    <img width="35" height="35" src="https://img.icons8.com/external-outline-lafs/64/external-ic_integration-crosschain-outline-lafs.png" alt="external-ic_integration-crosschain-outline-lafs"/>
                    <strong>{{ __('ERP.') }}</strong>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    @auth
                        @php
                            $latest_school_session = \App\Models\SchoolSession::latest()->first();
                            $current_school_session_name = null;
                            if($latest_school_session){
                                $current_school_session_name = $latest_school_session->session_name;
                            }
                        @endphp
                    @endauth
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="badge bg-light text-dark">{{ ucfirst(Auth::user()->role) }}</span>
                                    {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{route('password.edit')}}">
                                        <i class="bi bi-key me-2"></i> Change Password
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="bi bi-door-open me-2"></i> {{ __('Logout') }}
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
        @endauth
        <main class="h-100">
            @yield('content')
        </main>
    </div>
</body>
</html>
