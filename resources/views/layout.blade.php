<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduGame TOD</title>

    <!-- Bootstrap & Custom Styles -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        @import url('https://fonts.googleapis.com/css?family=Raleway:300,400,600');

        body {
            margin: 0;
            font-size: .9rem;
            font-weight: 400;
            color: #212529;
            text-align: left;
            background-color: #f5f8fa;
        }

        .navbar-laravel {
            box-shadow: 0 2px 4px rgba(0,0,0,.04);
        }

        .nav-link, .my-form, .login-form {
            font-family: Raleway, sans-serif;
            font-weight: bold;
        }

        .my-form, .login-form {
            padding: 1.5rem;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-transparant">
    <div class="container">
        <div>
        <!-- Button for toggling off-canvas -->
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Offcanvas -->
        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    @guest
                        <li class="nav-item"><a class="nav-link" href="{{ route('dashboard') }}">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}">Contact</a></li>
                    @else
                        <li class="nav-item"><a class="nav-link" href="{{ route('dashboard2') }}">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('index') }}">Question</a></li>
                    @endguest
                </ul>
            </div>
        </div>
        </div>
        <div class="d-flex">
            <div class="position-sticky">
                @guest
                    <a href="{{ route('login') }}" 
                        class="btn btn-sm mb-1 text-white mt-3" 
                        style="background-color: #6c57ec; border-color: #6c57ec; color: white; 
                                border-radius: 30px; width: 100px; padding: 5px;">
                        Login
                    </a>
                @else
                    <a href="{{ route('logout') }}" 
                        class="btn btn-sm mb-1 text-white mt-3" 
                        style="background-color: #6c57ec; border-color: #6c57ec; color: white; 
                                border-radius: 30px; width: 100px; padding: 5px;">
                        Logout
                    </a>
                @endguest
            </div>
            <a class="position-sticky navbar-brand d-flex align-items-center" href="{{ route('dashboard') }}">
                <img src="{{ asset('images/logoDashboard.png') }}" style="width: 50px; margin-left: 10px;" alt="Logo">
            </a>
        </div>
    </div>
</nav>

<main class="container py-4">
    @yield('content')
</main>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
