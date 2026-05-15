<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employment System Capstone</title>

    <!-- Bootstrap & Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- Custom Styles -->
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
</head>

<body>

    <header class="header_wrapper">
        <!-- ✅ Your Navbar -->
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img decoding="async" src="">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <i class="fas fa-bars navbar-toggler-icon"></i>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item d-flex align-items-center">
                            <img src="{{ asset('images/oip.png') }}" alt="Logo" class="logo me-2">
                            <a class="nav-link active margin-left text-bold" href="{{ route('welcome') }}">
                                Employment System
                            </a>
                        </li>
                    </ul>
                    <ul class="navbar-nav menu-navbar-nav">
                        <li class="nav-item"><a class="nav-link active" href="#featured-jobs">Jobs</a></li>
                        <li class="nav-item"><a class="nav-link" href="#events">Events</a></li>
                        <li class="nav-item"><a class="nav-link" href="#company">Company</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle d-flex align-items-center" href="#"
                                id="userDropdown" data-bs-toggle="dropdown">
                                <img src="{{ asset('images/user-logo.png') }}" alt="User Logo" class="logo me-2">
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="{{ route('jobseeker.dashboard') }}"><i
                                            class="bi bi-speedometer2 me-2"></i> Dashboard</a></li>
                                <li><a class="dropdown-item text-danger" href="{{ route('jobseeker.logout') }}"><i
                                            class="bi bi-box-arrow-right me-2"></i> Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- ✅ Matched Jobs Section -->
    <div class="container mt-4">
        <h2 class="mb-4 text-center text-primary">Matched Jobs</h2>

        <div class="row">
            @forelse($matchedJobs as $match)
                @if ($match->jobPost)
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="card shadow-sm border-0 h-100">
                            <div class="card-header bg-light d-flex justify-content-between align-items-center">
                                <h5 class="mb-0 text-dark">{{ $match->jobPost->title }}</h5>
                                <span
                                    class="badge
                                @if ($match->total_match_percent >= 75) bg-success
                                @elseif($match->total_match_percent >= 50) bg-info
                                @else bg-warning @endif">
                                    {{ $match->total_match_percent }}% Match
                                </span>
                            </div>
                            <div class="card-body">
                                <p class="card-text text-muted">{{ $match->jobPost->description }}</p>

                                <!-- Breakdown list with ✅ / ❌ -->
                                <ul class="list-group list-group-flush mb-3">
                                    <li class="list-group-item">
                                        <strong>Company:</strong>
                                        {{ $match->jobPost->companyDetails->company_name ?? 'N/A' }}
                                    </li>
                                    <li class="list-group-item">
                                        <strong>Location:</strong> {{ $match->jobPost->location }}
                                        {!! $match->location_match ? '✅' : '❌' !!}
                                    </li>
                                    <li class="list-group-item">
                                        <strong>Required Skill:</strong>
                                        {{ $match->jobPost->skill->name ?? 'N/A' }}
                                        {!! $match->skill_match_percent > 0 ? '✅' : '❌' !!}
                                    </li>
                                    <li class="list-group-item">
                                        <strong>Job Type:</strong> {{ ucfirst($match->jobPost->job_type) }}
                                        {!! $match->type_match ? '✅' : '❌' !!}
                                    </li>
                                    <li class="list-group-item">
                                        <strong>Salary:</strong> ₱{{ number_format($match->jobPost->salary) }}
                                        {!! $match->salary_match ? '✅ Meets Expectation' : '❌ Below Expectation' !!}
                                    </li>
                                </ul>

                                <!-- Progress bar -->
                                <div class="mt-3">
                                    <label class="fw-bold">Match Score</label>
                                    <div class="progress" style="height: 20px;">
                                        <div class="progress-bar progress-bar-striped progress-bar-animated
                                        @if ($match->total_match_percent == 100) bg-success
                                        @elseif($match->total_match_percent >= 75) bg-success
                                        @elseif($match->total_match_percent >= 50) bg-info
                                        @else bg-warning @endif"
                                            role="progressbar" style="width: {{ $match->total_match_percent }}%;"
                                            aria-valuenow="{{ $match->total_match_percent }}" aria-valuemin="0"
                                            aria-valuemax="100">
                                            {{ $match->total_match_percent }}%
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @empty
                <div class="col-12">
                    <div class="alert alert-info text-center">
                        No matched jobs found. Try updating your profile or skills to improve matches.
                    </div>
                </div>
            @endforelse
        </div>

        <div class="d-flex justify-content-center mt-4">
            {{ $matchedJobs->links('pagination::bootstrap-5') }}
        </div>
    </div>


    <!-- Scripts -->
    <script src="js/main.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>
