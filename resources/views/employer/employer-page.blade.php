<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employer Landing Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
       
        .hero {
            background: linear-gradient(135deg, #0d6efd, #0dcaf0);
            color: white;
            padding: 100px 20px;
        }

        .hero h1 {
            font-weight: 700;
            font-size: 3rem;
        }

        .hero-btn {
            background: #fff;
            color: #0d6efd;
            font-weight: bold;
            border-radius: 30px;
            padding: 12px 30px;
        }

        .feature-card {
            background: #fff;
            border-radius: 12px;
            padding: 20px;
            transition: transform 0.3s ease;
        }

        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }

        footer {
            background: #212529;
            color: #fff;
        }

        footer a {
            color: #fff;
            margin: 0 10px;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-light shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">Employment System</a>
            <div class="collapse navbar-collapse justify-content-end">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="#features">Features</a></li>
                    <li class="nav-item"><a class="nav-link" href="#stats">Stats</a></li>
                    <li class="nav-item"><a class="nav-link" href="#testimonials">Testimonials</a></li>
                    <li class="nav-item"><a class="btn btn-primary ms-3" href="#">Sign In</a></li>
                    <li class="nav-item"><a class="btn btn-outline-primary ms-2" href="#">Sign Up</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero -->
    <section class="hero text-center">
        <div class="container">
            <h1>Hire Smarter, Faster</h1>
            <p class="lead mt-3">Post jobs, manage applications, and find the best talent with ease.</p>
            <a href="#" class="btn hero-btn btn-lg mt-4">Create Employer Account</a>
        </div>
    </section>

    <!-- Features -->
    <section class="py-5 bg-light text-center" id="features">
        <div class="container">
            <h2 class="mb-4">Why Employers Choose Us</h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="feature-card">
                        <h5>📢 Easy Job Posting</h5>
                        <p>Post jobs in minutes.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card">
                        <h5>📊 Smart Matching</h5>
                        <p>Find candidates faster.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card">
                        <h5>📁 Manage Applications</h5>
                        <p>Track and review easily.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats -->
    <section class="py-5 text-center" id="stats">
        <div class="container">
            <h2 class="mb-4">Trusted by Employers Worldwide</h2>
            <div class="row">
                <div class="col-md-4">
                    <h3 class="fw-bold text-primary">10,000+</h3>
                    <p>Jobs Posted</p>
                </div>
                <div class="col-md-4">
                    <h3 class="fw-bold text-primary">50,000+</h3>
                    <p>Applications Managed</p>
                </div>
                <div class="col-md-4">
                    <h3 class="fw-bold text-primary">5,000+</h3>
                    <p>Employers Served</p>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works -->
    <section class="py-5 text-center">
        <div class="container">
            <h2 class="mb-4">How It Works</h2>
            <div class="row">
                <div class="col-md-4">
                    <h5>1️⃣ Create Account</h5>
                    <p>Sign up as an employer in minutes.</p>
                </div>
                <div class="col-md-4">
                    <h5>2️⃣ Post Jobs</h5>
                    <p>Publish openings and reach candidates instantly.</p>
                </div>
                <div class="col-md-4">
                    <h5>3️⃣ Hire Talent</h5>
                    <p>Review applications and hire the best fit.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="py-5 bg-light text-center" id="testimonials">
        <div class="container">
            <h2 class="mb-4">What Employers Say</h2>
            <div class="row">
                <div class="col-md-6">
                    <div class="p-4 bg-white rounded shadow-sm">
                        <img src="https://tse1.explicit.bing.net/th/id/OIP.5ht301ZH6tmgBi7rJSRVRAHaHa?cb=defcache2&pid=ImgDet&defcache=1&w=184&h=184&c=7&o=7&rm=3"
                            class="rounded-circle mb-3" width="60" alt="Jane">
                        <p>"This platform made hiring so much faster and easier!"</p>
                        <strong>- Jhon Doe., HR Manager</strong>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="p-4 bg-white rounded shadow-sm">
                        <img src="https://randomuser.me/api/portraits/men/32.jpg" class="rounded-circle mb-3"
                            width="60" alt="Mark">
                        <p>"Smart matching saved us tons of time."</p>
                        <strong>- Mark R., CEO</strong>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ -->
    <section class="py-5" id="faq">
        <div class="container">
            <h2 class="mb-4 text-center">Frequently Asked Questions</h2>
            <div class="accordion" id="faqAccordion">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="faq1">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapse1">
                            How much does it cost to post a job?
                        </button>
                    </h2>
                    <div id="collapse1" class="accordion-collapse collapse show">
                        <div class="accordion-body">Posting jobs is free for basic accounts. Premium plans offer more
                            visibility.</div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="faq2">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapse2">
                            How do I track applications?
                        </button>
                    </h2>
                    <div id="collapse2" class="accordion-collapse collapse">
                        <div class="accordion-body">You can track, review, and manage applications directly from your
                            employer dashboard.</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Final CTA -->
    <section class="py-5 bg-primary text-white text-center">
        <div class="container">
            <h2 class="fw-bold">Start Hiring Smarter Today</h2>
            <p class="lead">Join thousands of employers who trust our platform.</p>
            <a href="#" class="btn btn-light btn-lg mt-3">Get Started</a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="text-center py-3">
        <p>© {{ date('Y') }} Employer Portal. All Rights Reserved.</p>
        <div>
            <a href="#"><i class="fab fa-facebook fa-lg"></i></a>
            <a href="#"><i class="fab fa-twitter fa-lg"></i></a>
            <a href="#"><i class="fab fa-linkedin fa-lg"></i></a>
        </div>
    </footer>

    <script src="https://kit.fontawesome.com/a2e0a1f69d.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
