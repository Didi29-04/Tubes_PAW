<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet">

    <!-- Vite -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.bootstrap5.min.css">
</head>

<body class="font-sans bg-light">
    <div class="min-vh-100 d-flex flex-column">

        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-warning border-bottom">
            <div class="container">
                <!-- Logo -->
                <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
                    <img src="{{ asset('images/key_icon.png') }}" alt="AHLI KUNCI" height="30">
                </a>

                <!-- Navbar Toggler -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <!-- Left Navigation Links -->
                    <ul class="navbar-nav me-auto">
                        @auth
                        <!-- Outlet Location menu hanya muncul setelah login -->
                        <li class="nav-item">
                            <a href="{{ route('map') }}" class="nav-link {{ request()->routeIs('map') ? 'active' : '' }}">
                                Outlet Location
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('outlets.index') }}"
                                class="nav-link {{ request()->routeIs('outlets.index') ? 'active' : '' }}">
                                Outlet List
                            </a>
                        </li>
                        @endauth
                    </ul>

                    <!-- Right User Links -->
                    <ul class="navbar-nav ms-auto">
                        @auth
                        <!-- User Dropdown Menu -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="dropdown-item">Log Out</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                        @endauth

                        @guest
                        <!-- Login/Register Links -->
                        <li class="nav-item">
                            <a href="{{ route('login') }}" class="nav-link">Login</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('register') }}" class="nav-link">Register</a>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Page Heading -->
        @if (isset($header))
        <header class="bg-white shadow py-3 mb-4">
            <div class="container">
                {{ $header }}
            </div>
        </header>
        @endif

        <!-- Page Content -->
        <main class="flex-grow-1">
            <div class="container">
                @yield('content')
            </div>
        </main>
    </div>

    <!-- Footer -->
    <!-- Footer -->
<footer class="footer bg-dark text-light py-4">
    <div class="container">
        <div class="row text-center text-md-start">
            <!-- Logo and Slogan -->
            <div class="col-md-3 mb-3 mb-md-0">
                <h5 class="text-uppercase">LOGO</h5>
                <p class="small">LOCKSMITH</p>
            </div>
            <!-- Column 1 -->
            <div class="col-md-3 mb-3 mb-md-0">
                <h6 class="text-uppercase">Links</h6>
                <ul class="list-unstyled">
                    <li><a href="#" class="text-light text-decoration-none small">Weebly Themes</a></li>
                    <li><a href="#" class="text-light text-decoration-none small">Pre-sale FAQs</a></li>
                    <li><a href="#" class="text-light text-decoration-none small">Submit a Ticket</a></li>
                </ul>
            </div>
            <!-- Column 2 -->
            <div class="col-md-3 mb-3 mb-md-0">
                <h6 class="text-uppercase">Services</h6>
                <ul class="list-unstyled">
                    <li><a href="#" class="text-light text-decoration-none small">Services</a></li>
                    <li><a href="#" class="text-light text-decoration-none small">Theme Tweak</a></li>
                </ul>
            </div>
            <!-- Column 3 -->
            <div class="col-md-3">
                <h6 class="text-uppercase">Support</h6>
                <ul class="list-unstyled">
                    <li><a href="#" class="text-light text-decoration-none small">About Us</a></li>
                    <li><a href="#" class="text-light text-decoration-none small">Contact Us</a></li>
                    <li><a href="#" class="text-light text-decoration-none small">Resources</a></li>
                </ul>
            </div>
        </div>

        <!-- Social Media -->
        <div class="row mt-4">
            <div class="col text-center">
                <a href="#" class="text-light mx-2"><i class="bi bi-facebook"></i></a>
                <a href="#" class="text-light mx-2"><i class="bi bi-twitter"></i></a>
                <a href="#" class="text-light mx-2"><i class="bi bi-google"></i></a>
                <a href="#" class="text-light mx-2"><i class="bi bi-instagram"></i></a>
            </div>
        </div>

        <!-- Copyright -->
        <div class="row mt-3">
            <div class="col text-center">
                <p class="small mb-0">&copy; {{ date('Y') }}. All rights reserved.</p>
            </div>
        </div>
    </div>
</footer>


    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>

    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.bootstrap5.min.js"></script>

    @include('sweetalert::alert')
    @stack('scripts')
</body>

</html>
