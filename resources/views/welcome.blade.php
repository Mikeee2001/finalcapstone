<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employment System Capstone</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
    <link rel="stylesheet" href="css1/responsive-style.css">
</head>

<!-- Updated Header Section -->
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
                        <a class="nav-link active" aria-current="page" href="#home">Jobs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">Company</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#events">Events</a>
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

<body data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="100">

    <!-- Hero Section -->
    <section class="hero-section d-flex align-items-center text-center text-white"
        style="height:100vh; position:relative; overflow:hidden;">

        <!-- Background Logo -->
        <div class="hero-logo-bg position-absolute w-100 h-100"></div>

        <!-- Gradient Overlay -->
        <div class="hero-overlay position-absolute w-100 h-100"
            style="background: linear-gradient(135deg, rgba(0,33,71,0.7), rgba(220,53,69,0.5)); z-index:1;">
        </div>

        <!-- Content -->
        <div class="container position-relative" style="z-index:2;">
            <h1 class="display-4 fw-bold">Smart Employment Matching</h1>
            <p class="lead">Connecting jobseekers with trusted employers</p>
            <div class="mt-4">
                <a href="{{ route('signup') }}" class="main-btn fill-btn me-3 mb-2">Apply Now</a>
                <a href="#about" class="main-btn fill-btn me-3 mb-2">Learn More</a>
            </div>
        </div>
    </section>


    <!-- Jobs Section -->
    <section id="jobs" class="py-5">
        <div class="container">
            <h2 class="text-center mb-4">Featured Jobs</h2>
            <div class="row">
                {{-- @foreach ($jobs as $job) --}}
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body text-center">
                            <img src="#" class="img-fluid mb-3" style="max-height:60px;">
                            <h5 class="card-title">Job Title</h5>
                            <p class="text-muted">Company Name</p>
                            <p><strong>Salary:</strong> $job->salary_min - salary_max</p>
                            <span class="badge bg-info">job_type</span>
                        </div>
                        <div class="card-footer text-center">
                            <a href="#" class="btn btn-primary">Apply Now</a>
                        </div>
                    </div>
                </div>
                {{-- @endforeach --}}
            </div>
            <div class="text-center mt-4">
                <a href="#" class="btn btn-outline-primary btn-lg">View All Jobs</a>
            </div>
        </div>
    </section>

    <!-- Company Section -->
    <section id="company" class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-4">Featured Employers</h2>
            <div class="row">
                {{-- @foreach ($companies as $company) --}}
                <div class="col-md-3 mb-4">
                    <div class="card h-100 text-center shadow-sm">
                        <div class="card-body">
                            <img src="#" class="img-fluid mb-3" style="max-height:60px;">
                            <h5 class="card-title">Company Name</h5>
                            <p class="text-muted">Company Address</p>
                        </div>
                    </div>
                </div>
                {{-- @endforeach --}}
            </div>
        </div>
    </section>

    <!-- Events Section -->
    <section id="events" class="py-5">
        <div class="container">
            <h2 class="text-center mb-4">Upcoming Events</h2>
            <div class="row">
                {{-- @foreach ($events as $event) --}}
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Event Title</h5>
                            <p class="text-muted">Event Location</p>
                            <p><strong>Date:</strong> Event Date</p>
                            {{-- @if (now()->between($event->start_time, $event->end_time))
                                        <span class="badge bg-success">Ongoing</span>
                                    @elseif(now()->lt($event->start_time))
                                        <span class="badge bg-info">Upcoming</span>
                                    @else
                                        <span class="badge bg-secondary">Finished</span>
                                    @endif --}}
                        </div>
                    </div>
                </div>
                {{-- @endforeach --}}
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-4">About Us</h2>
            <div class="row align-items-center">
                <div class="col-md-6">
                    <p>Our Employment System connects job seekers with employers through intelligent matching. We
                        evaluate skills, preferences, salary expectations, and location to generate accurate matches.
                    </p>
                    <p>Employers can post jobs, manage applications, and find qualified candidates efficiently.</p>
                </div>
                <div class="col-md-6 text-center">
                    <i class="fas fa-briefcase fa-6x text-primary mb-3"></i>
                    <h5>Smart Matching • Faster Hiring • Better Opportunities</h5>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="py-5 text-center text-white" style="background:#00A3C8;">
        <div class="container">
            <h2 class="fw-bold">Ready to Find Your Next Opportunity?</h2>
            <a href="{{ route('signup') }}" class="btn btn-light btn-lg me-2">Sign Up as Jobseeker</a>
            <a href="{{ route('employerSignup') }}" class="btn btn-outline-light btn-lg">Sign Up as Employer</a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-3">
        <p>&copy; {{ date('Y') }} PESO Employment System. All rights reserved.</p>
    </footer>

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script><!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>

    <script src="js/main.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            @if (session('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: '{{ session('success') }}',
                    confirmButtonText: 'OK'
                });
            @endif

            @if (session('error'))
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: '{{ session('error') }}',
                    confirmButtonText: 'Try Again'
                });
            @endif
        });

        // JavaScript to toggle navbar on scroll
        document.addEventListener("scroll", function() {
            const navbar = document.querySelector(".header_wrapper .navbar");
            if (window.scrollY > 50) {
                navbar.classList.add("header-scrolled");
            } else {
                navbar.classList.remove("header-scrolled");
            }
        });
    </script>

</body>

</html>
