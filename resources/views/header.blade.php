<!-- Updated Header Section -->

<head>
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
</head>

<header class="header_wrapper">
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img decoding="async" src="">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars navbar-toggler-icon"></i>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item d-flex align-items-center">
                        <!-- Logo -->
                        <img src="{{ asset('images/oip.png') }}" alt="Logo" class="logo me-2">

                        <!-- Text -->
                        <a class="nav-link active margin-left text-bold" aria-current="page"
                            href="{{ route('welcome') }}">
                            Employment System
                        </a>
                    </li>

                </ul>
                <ul class="navbar-nav menu-navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#featured-jobs">Jobs</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#events">Events</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#company">Company</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#about">About</a>
                    </li>

                    <li class="nav-item ms-lg-3">
                        <a class="nav-link fill-btn main-btn" href="{{ route('signin') }}">Sign in</a>
                    </li>

                    <li class="nav-item ms-lg-2">
                        <a class="signup nav-link main-btn" href="{{ route('employer') }}">Employer Site</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
