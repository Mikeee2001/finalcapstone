<style>
    .job-card {
        border: none;              /* remove border */
        border-radius: 0;          /* remove rounded corners */
        transition: transform 0.25s ease, box-shadow 0.25s ease;
    }

    .job-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 12px 28px rgba(0, 0, 0, 0.15); /* subtle shadow only */
    }

    /* Remove box styles from badges */
    .salary-badge,
    .skill-badge,
    .jobtype-badge {
        background: none;          /* no background */
        color: #000;               /* plain black text */
        border: none;              /* no border */
        font-weight: 500;          /* keep text bold-ish */
        padding: 0;                /* no padding */
    }

    .card-footer {
        border-top: 1px solid #eee;   /* subtle divider */
        font-size: 0.85rem;           /* smaller text for metadata */
        padding: 8px 12px;            /* balanced spacing */
    }

    .card-footer small {
        font-style: italic;           /* softer look for metadata */
    }
</style>

<div class="row justify-content-center">
    @forelse ($jobs as $job)
        <div class="col-md-4 col-sm-6 mb-3">
            <div class="card h-100 shadow-sm job-card">

                <div class="card-body text-center p-3">
                    @if ($job->companyDetails && $job->companyDetails->company_logo)
                        <img src="{{ asset('storage/' . $job->companyDetails->company_logo) }}"
                             class="img-fluid mb-2 rounded-circle border"
                             style="height:50px; width:50px; object-fit:cover;">
                    @endif

                    <h6 class="fw-bold mb-1">{{ $job->title }}</h6>
                    <p class="mb-1">{{ $job->companyDetails?->company_name ?? 'Unknown Company' }}</p>

                    <p class="mb-1">
                        <i class="bi bi-geo-alt"></i> {{ $job->location }}
                    </p>

                    <p class="mb-2">
                        <span class="salary-badge">
                            ₱{{ number_format($job->salary_min) }} – ₱{{ number_format($job->salary_max) }} / month
                        </span>
                    </p>

                    @if ($job->skill)
                        <span class="skill-badge">
                            {{ $job->skill->skill_name }}
                        </span>
                    @endif

                    <div class="mt-2">
                        <span class="jobtype-badge">
                            {{ ucfirst($job->job_type) }}
                        </span>
                    </div>
                </div>

                <!-- ✅ Footer with actual date -->
                <div class="card-footer bg-light d-flex justify-content-end align-items-center">
                    <small class="text-muted">
                        Posted on {{ \Carbon\Carbon::parse($job->created_at)->format('M d, Y') }}
                    </small>
                </div>

            </div>
        </div>
    @empty
        <div class="col-12 text-center">
            <p>No jobs available.</p>
        </div>
    @endforelse
</div>

<!-- Pagination -->
<div class="d-flex justify-content-center mt-3">
    {{ $jobs->fragment('featured-jobs')->links('pagination::bootstrap-5') }}
</div>
