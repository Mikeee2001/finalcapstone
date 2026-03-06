<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employer Portal</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/employer-page.css') }}">

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/a2e0a1f69d.js" crossorigin="anonymous"></script>
</head>

<body>

    <!-- HEADER -->
    <header class="header_wrapper">
        <nav class="navbar navbar-expand-lg custom-navbar">
            <div class="container">

                <!-- Brand -->
                <a class="navbar-brand brand-text" href="#">
                    Employment System
                </a>

                <!-- Mobile Toggle -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Menu -->
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">

                    <ul class="navbar-nav align-items-center">

                        <li class="nav-item">
                            <a class="nav-link" href="#">Jobs</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#">Company</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#">Events</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#">About</a>
                        </li>

                        <!-- Sign In Button -->
                        <li class="nav-item ms-lg-3">
                            <a class="btn btn-signin" href="{{ route('signin') }}">
                                Sign In
                            </a>
                        </li>

                        <!-- Employer Site Button -->
                        <li class="nav-item ms-lg-2">
                            <a class="btn btn-employer" href="{{ route('employersignupForm') }}">
                               signup
                            </a>
                        </li>

                    </ul>

                </div>
            </div>
        </nav>
    </header>


    <!-- HERO -->
    <section class="py-5 text-center bg-light">
        <div class="container py-5">
            <h1 class="display-5 fw-bold">Hire Smarter, Faster</h1>
            <p class="lead mt-3">
                Post jobs, manage applications, and find the best talent with ease.
            </p>
            <a href="{{ route('signup') }}" class="btn btn-primary btn-lg mt-4">
                Create Employer Account
            </a>
        </div>
    </section>

    <!-- FEATURES -->
    <section class="py-5 text-center">
        <div class="container">
            <h2 class="mb-5 fw-bold">Why Employers Choose Us</h2>

            <div class="row g-4">
                <div class="col-md-4">
                    <div class="p-4 shadow-sm rounded bg-white h-100">
                        <h5>📢 Easy Job Posting</h5>
                        <p class="text-muted">Post jobs in minutes and reach qualified candidates instantly.</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="p-4 shadow-sm rounded bg-white h-100">
                        <h5>📊 Smart Matching</h5>
                        <p class="text-muted">Our system matches your job with the best applicants.</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="p-4 shadow-sm rounded bg-white h-100">
                        <h5>📁 Manage Applications</h5>
                        <p class="text-muted">Track, review, and manage candidates easily.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- STATS -->
    <section class="py-5 bg-light text-center">
        <div class="container">
            <h2 class="mb-5 fw-bold">Trusted by Employers Worldwide</h2>

            <div class="row">
                <div class="col-md-4">
                    <h3 class="fw-bold text-primary">10,000+</h3>
                    <p class="text-muted">Jobs Posted</p>
                </div>

                <div class="col-md-4">
                    <h3 class="fw-bold text-primary">50,000+</h3>
                    <p class="text-muted">Applications Managed</p>
                </div>

                <div class="col-md-4">
                    <h3 class="fw-bold text-primary">5,000+</h3>
                    <p class="text-muted">Employers Served</p>
                </div>
            </div>
        </div>
    </section>

    <!-- FINAL CTA -->
    <section class="py-5 bg-primary text-white text-center">
        <div class="container">
            <h2 class="fw-bold">Start Hiring Smarter Today</h2>
            <p class="lead">Join thousands of employers who trust our platform.</p>
            <a href="{{ route('employersignupForm') }}" class="btn btn-light btn-lg mt-3">
                Get Started
            </a>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="text-center py-4 bg-dark text-white">
        <p class="mb-2">© {{ date('Y') }} Employer Portal. All Rights Reserved.</p>

        <div>
            <a href="#" class="text-white me-3">
                <i class="fab fa-facebook"></i>
            </a>
            <a href="#" class="text-white me-3">
                <i class="fab fa-twitter"></i>
            </a>
            <a href="#" class="text-white">
                <i class="fab fa-linkedin"></i>
            </a>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
