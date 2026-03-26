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


<body data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="100">

    @include('header')

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

    <!-- Featured Jobs Section -->
    <section id="featured-jobs" class="py-4 bg-light">
        <div class="container">
            <h2 class="text-center fw-bold text-primary mb-3">🌟 Featured Jobs</h2>

            <div id="jobs-container">
                @include('partials.jobs')
            </div>
        </div>
    </section>

    <!-- Events Section -->
    <section id="events" class="py-2 bg-light">
        <div class="container text-center">
            <h2 class="fw-bold text-primary mb-2">📅 Events</h2>

            <div class="row justify-content-center">
                @forelse ($events as $event)
                    <div class="col-md-4 mb-3">
                        <div class="card shadow-sm border-0 h-100">
                            <div class="card-header bg-primary text-white fw-bold">
                                {{ $event->event_name }}
                            </div>

                            <div class="card-body">
                                <p class="mb-1">
                                    <i class="bi bi-geo-alt-fill text-danger"></i>
                                    <span class="fw-semibold">{{ $event->location }}</span>
                                </p>

                                <p class="mb-2">
                                    <i class="bi bi-calendar-event text-success"></i>
                                    <strong>Date:</strong>
                                    {{ \Carbon\Carbon::parse($event->start_time)->format('M d, Y H:i') }}
                                    –
                                    {{ \Carbon\Carbon::parse($event->end_time)->format('M d, Y H:i') }}
                                </p>

                                @if (now()->between($event->start_time, $event->end_time))
                                    <span class="badge bg-success">Ongoing</span>
                                @elseif (now()->lt($event->start_time))
                                    <span class="badge bg-info">Upcoming</span>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="alert alert-warning fw-bold">
                            No events available right now.
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Company Section -->
    <section id="company" class="py-3 bg-light">
        <div class="container">
            <h2 class="text-center fw-bold text-primary mb-3">🏢 Featured Employers</h2>

            <div class="row">
                <div class="col-md-3 mb-3">
                    <div class="card h-100 text-center shadow-sm">
                        <div class="card-body">
                            <img src="#" class="img-fluid mb-2" style="max-height:60px;">
                            <h5 class="card-title">Company Name</h5>
                            <p class="text-muted">Company Address</p>
                        </div>
                    </div>
                </div>
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

    <!-- AJAX Pagination Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const jobsContainer = document.getElementById('jobs-container');
            const eventsContainer = document.getElementById('events-container');

            function createSpinner() {
                const spinner = document.createElement('div');
                spinner.className = "overlay-spinner";
                spinner.innerHTML =
                    '<div class="spinner-border text-primary" role="status"><span class="visually-hidden">Loading...</span></div>';
                return spinner;
            }

            // Jobs pagination
            jobsContainer.addEventListener('click', function(e) {
                const link = e.target.closest('.pagination a');
                if (link) {
                    e.preventDefault();
                    const url = link.getAttribute('href');

                    jobsContainer.style.position = "relative";
                    const jobsSpinner = createSpinner();
                    jobsContainer.appendChild(jobsSpinner);

                    fetch(url, {
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest'
                            }
                        })
                        .then(response => response.text())
                        .then(html => {
                            jobsContainer.innerHTML = html;
                            jobsContainer.scrollIntoView({
                                behavior: 'smooth',
                                block: 'start'
                            });
                        })
                        .catch(err => console.error(err))
                        .finally(() => {
                            jobsSpinner.classList.add("fade-out");
                            setTimeout(() => jobsSpinner.remove(), 400); // wait for transition
                        });
                }
            });

            // Events pagination
            eventsContainer.addEventListener('click', function(e) {
                const link = e.target.closest('#pagination-links a');
                if (link) {
                    e.preventDefault();
                    const url = link.getAttribute('href');

                    eventsContainer.style.position = "relative";
                    const eventsSpinner = createSpinner();
                    eventsContainer.appendChild(eventsSpinner);

                    fetch(url, {
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest'
                            }
                        })
                        .then(response => response.text())
                        .then(html => {
                            eventsContainer.innerHTML = html;
                            eventsContainer.scrollIntoView({
                                behavior: 'smooth',
                                block: 'start'
                            });
                        })
                        .catch(err => console.error(err))
                        .finally(() => {
                            eventsSpinner.classList.add("fade-out");
                            setTimeout(() => eventsSpinner.remove(), 400);
                        });
                }
            });
        });
    </script>


</body>

</html>
