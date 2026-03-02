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
                    <li class="nav-item"> <a class="nav-link active margin-left text-bold" aria-current="page"
                            href="#home">Employment System</a> </li>
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
                        <a class="signup nav-link main-btn" href="{{ route( 'employer') }}">Employer Site</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<body data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="100">

    <section id="home" class="home">
        <div class="banner_wrapper wrapper">
            <div class="container">
                <div class="row align-items-center">

                    <!-- Left side: text -->
                    <div class="col-md-6 order-md-1 order-2">
                        <h3>Better Opportunities Through</h3>
                        <h1>Smart Employment Matching</h1>
                        <p>
                            Discover a modern employment system designed to connect job seekers with the right
                            employers. Our intelligent matching process evaluates skills, preferences, and location to
                            help you find opportunities that truly fit your career goals.
                        </p>
                        <div class="mt-4 d-flex flex-wrap">
                            <a href="{{ route('signup') }}" class="main-btn fill-btn me-3 mb-2">Apply Now</a>
                            <a href="#about" class="main-btn mb-2">About</a>
                        </div>
                    </div>

                    <!-- Right side: image -->
                    <div id="image" class="col-md-6 order-md-2 order-1 mb-md-0 mb-5 text-center">
                        <img class="img-fluid aimg1" src="{{ asset('images/2.png') }}" alt="Employment illustration">
                    </div>

                </div>
            </div>
        </div>
    </section>


    <div class="container">

        <section id="home">
            <h3>Jobs</h3>
            <p>Job listings here...</p>
        </section>

        <section id="company">
            <h3>Company</h3>
            <p>Company info here...</p>
        </section>

        <section id="events">
            <h3>Events</h3>
            <p>Events here...</p>
        </section>

        <section id="about" class="py-5 bg-light">
            {{-- <h2 class="text-center mb-4 text-dark">About Us</h2> --}}
            <div class="container">
                <div class="row align-items-center">

                    <div class="col-md-6">

                        <p style="text-align: justify">
                            Our Employment System is a web-based platform designed to connect job seekers with employers
                            through
                            an intelligent job matching process. The system evaluates skills, job preferences, salary
                            expectations,
                            and location to generate an accurate match percentage for every available job.
                        </p>

                        <p style="text-align: justify">
                            Job seekers can create profiles, add skills, and receive personalized job recommendations,
                            while
                            employers can post job openings, manage applications, and find qualified candidates
                            efficiently.
                        </p>

                        <p style="text-align: justify">
                            By using a matching percentage system, we help users make informed decisions and reduce the
                            time spent
                            searching for suitable opportunities.
                        </p>
                    </div>

                    <div class="col-md-6 text-center">
                        <i class="fas fa-briefcase fa-6x text-primary mb-3"></i>
                        <h5>Smart Matching • Faster Hiring • Better Opportunities</h5>
                    </div>

                </div>

                <hr class="my-4">

                <section id="">
                    <div class="row text-center">
                        <div class="col-md-4">
                            <h5>🎯 Our Mission</h5>
                            <p>To simplify job searching and hiring by providing accurate job matches based on real
                                qualifications.</p>
                        </div>

                        <div class="col-md-4">
                            <h5>🚀 Our Vision</h5>
                            <p>To become a trusted employment platform that empowers individuals and businesses.</p>
                        </div>

                        <div class="col-md-4">
                            <h5>🤝 Our Values</h5>
                            <p>Transparency, efficiency, and user-focused design.</p>
                        </div>
                    </div>
                </section>

            </div>
        </section>
        <div>
            <section class="cta py-3 text-center text-white" style="background:#00A3C8;">
                <div class="container">
                    <h2>Ready to Find Your Next Opportunity?</h2> <a href="{{ route('signup') }}"
                        class="main-btn fill-btn me-3 mb-2">Get Started</a>
                </div>
            </section>
        </div>

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
