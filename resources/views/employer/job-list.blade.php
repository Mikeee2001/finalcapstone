@include('employer.layout.header')

<head>
    <link rel="stylesheet" href="{{ asset('dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">

</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        @include('employer.layout.navbar')

        @include('employer.layout.sidebar')

        <!-------------------------------------- Main content ---------------------------------------->

        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title" style="font-size: 2em">Jobs List</h3>
                            <!-- Add New Account Button -->
                            <button class="btn btn-primary float-right" data-toggle="modal" data-target="#addJobModal">
                                Add Job
                            </button>
                        </div>
                        <div class="card-body">

                            <div id="tableLoader" class="custom-loader"></div>

                            <table id="jobsTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr class="text-center">

                                        <td>No.</td>
                                        <th>Job Title</th>
                                        <th>Job Description</th>
                                        <th>Location</th>
                                        <th>Salary Range</th>
                                        <th>Job Type</th>
                                        <th>Skill Required</th>
                                        <th>Date Posted</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($jobs as $index => $job)
                                        <tr class="text-center">
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $job->title }}</td>
                                            <td>{{ $job->description }}</td>
                                            <td>{{ $job->location }}</td>
                                            <td>{{ $job->salary_min }} - {{ $job->salary_max }}</td>
                                            <td>{{ ucfirst($job->job_type) }}</td>
                                            <td>{{ $job->skill ? $job->skill->skill_name : 'N/A' }}</td>
                                            <td>{{ $job->created_at->format('Y-m-d') }}</td>
                                            <td>
                                                <span
                                                    class="badge {{ $job->status === 'active' ? 'bg-success' : 'bg-danger' }}">
                                                    {{ ucfirst($job->status) }}
                                                </span>

                                                <button
                                                    class="btn btn-sm {{ $job->status === 'active' ? 'btn-outline-danger' : 'btn-outline-success' }} status-btn ms-2"
                                                    data-url="{{ route('employer.toggle-job-status', $job->id) }}">
                                                    {{ $job->status === 'active' ? 'Deactivate' : 'Activate' }}
                                                </button>
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal for Adding New Job -->
        <div class="modal fade" id="addJobModal" tabindex="-1" role="dialog" aria-labelledby="addJobModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">

                    <!-- Header -->
                    <div class="modal-header">
                        <h5 class="modal-title" id="addJobModalLabel">Add Job</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                    </div>

                    <!-- Form -->
                    <form id="addJobForm" method="POST" action="{{ route('employer.post-job') }}"
                        class="form-horizontal">
                        @csrf
                        <div class="modal-body">

                            <!-- Job Title -->
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Job Title</label>
                                <div class="col-sm-9">
                                    <input type="text" name="title" class="form-control"
                                        placeholder="Enter job title" required>
                                    <span class="text-danger error-text title_error"></span>
                                </div>
                            </div>

                            <!-- Description -->
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Job Description</label>
                                <div class="col-sm-9">
                                    <textarea name="description" class="form-control" placeholder="Enter job description"></textarea>
                                    <span class="text-danger error-text description_error"></span>
                                </div>
                            </div>

                            <!-- Job Type -->
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Job Type</label>
                                <div class="col-sm-9">
                                    <select name="job_type" class="form-control" required>
                                        <option value="">Select Job Type</option>
                                        <option value="full-time">Full-time</option>
                                        <option value="part-time">Part-time</option>
                                    </select>
                                    <span class="text-danger error-text job_type_error"></span>
                                </div>
                            </div>

                            <!-- Location -->
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Location</label>
                                <div class="col-sm-9">
                                    <input type="text" name="location"required class="form-control"
                                        placeholder="Enter location" required>
                                    <span class="text-danger error-text location_error"></span>
                                </div>
                            </div>

                            <!-- Salary Range -->
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Minimum Salary</label>
                                <div class="col-sm-9">
                                    <input type="number" name="salary_min" class="form-control"
                                        placeholder="Enter minimum salary" required>
                                    <span class="text-danger error-text salary_min_error"></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Maximum Salary</label>
                                <div class="col-sm-9">
                                    <input type="number" name="salary_max" class="form-control"
                                        placeholder="Enter maximum salary" required>
                                    <span class="text-danger error-text salary_max_error"></span>
                                </div>
                            </div>

                            <!-- Required Skill -->
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Required Skill</label>
                                <div class="col-sm-9">
                                    <select name="skill_id" id="skill" class="form-control"></select>
                                    <span class="text-danger error-text skill_error"></span>
                                </div>
                            </div>

                        </div>

                        <!-- Footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add Job</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <!-------------------------------------- Main content ---------------------------------------->

        @include('layout.footer')

        <!-- DataTables CSS -->
        <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">

        <!-- Select2 CSS -->
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

        <!-- jQuery -->
        <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

        <!-- DataTables JS -->
        <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>

        <!-- Select2 JS -->
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

        <!-- Toastr -->
        <script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <!-- Your custom scripts (initialization) -->
        <script>
            $(document).ready(function() {
                // DataTable init
                $('#jobsTable').DataTable({
                    paging: true,
                    searching: true,
                    ordering: true,
                    dom: 'lrtip',
                    columnDefs: [{
                        orderable: false,
                        targets: [6, 7, 8]
                    }]
                });
            });
        </script>


        <script>
            document.addEventListener('DOMContentLoaded', function() {
                @if (session('success'))
                    toastr.success("{{ session('success') }}");
                @endif

                @if (session('error'))
                    toastr.error("{{ session('error') }}");
                @endif
            });
        </script>

        <!-- Optional: Toastr config -->
        <script>
            toastr.options = {
                "closeButton": true,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "timeOut": "5000"
            };
        </script>

        <script>
            $(document).ready(function() {

                // Initialize Select2 when modal opens
                $('#addJobModal').on('shown.bs.modal', function() {
                    $('#skill').select2({
                        dropdownParent: $('#addJobModal'),
                        placeholder: "Select or enter skill",
                        width: '100%',
                        minimumInputLength: 1,
                        ajax: {
                            url: "{{ route('employer.skills-search') }}",
                            dataType: 'json',
                            delay: 250,
                            data: function(params) {
                                return {
                                    q: params.term
                                };
                            },
                            processResults: function(data) {
                                return {
                                    results: data.results
                                };
                            }
                        }
                    });
                });

                // AJAX form submit
                $('#addJobForm').on('submit', function(e) {
                    e.preventDefault();

                    let formData = new FormData(this);
                    $('span.error-text').text('');

                    $.ajax({
                        url: "{{ route('employer.post-job') }}",
                        method: 'POST',
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function(response) {
                            if (response.success) {
                                $('#addJobModal').modal('hide');
                                $('#addJobForm')[0].reset();
                                toastr.success('Job post created successfully!');
                                location.reload();
                            } else {
                                toastr.error(response.error || 'Something went wrong.');
                            }
                        },
                        error: function(response) {
                            if (response.status === 422) {
                                let errors = response.responseJSON.errors;
                                $.each(errors, function(field, error) {
                                    $('span.' + field + '_error').text(error[0]);
                                });
                                toastr.error('Please fix the errors and try again.');
                            } else {
                                toastr.error('Unexpected error occurred.');
                            }
                        }
                    });
                });

            });
        </script>

        <script>
            document.querySelectorAll('.status-btn').forEach(btn => {
                btn.addEventListener('click', function() {
                    let url = this.dataset.url; // Laravel-generated URL
                    let badge = this.previousElementSibling;
                    let button = this;

                    fetch(url, {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                'Content-Type': 'application/json'
                            }
                        })
                        .then(res => res.json())
                        .then(data => {
                            if (data.status === 'active') {
                                button.innerHTML = 'Deactivate';
                                button.className = 'btn btn-sm btn-outline-danger status-btn ms-2';
                                badge.className = 'badge bg-success';
                                badge.innerHTML = 'Active';
                            } else {
                                button.innerHTML = 'Activate';
                                button.className = 'btn btn-sm btn-outline-success status-btn ms-2';
                                badge.className = 'badge bg-danger';
                                badge.innerHTML = 'Inactive';
                            }

                            // ✅ Toast notification
                            Swal.fire({
                                toast: true,
                                position: 'top-end',
                                icon: 'success',
                                title: 'Job status updated!',
                                showConfirmButton: false,
                                timer: 2000,
                                timerProgressBar: true
                            });
                        })
                        .catch(() => {
                            Swal.fire({
                                toast: true,
                                position: 'top-end',
                                icon: 'error',
                                title: 'Something went wrong!',
                                showConfirmButton: false,
                                timer: 2000,
                                timerProgressBar: true
                            });
                        });
                });
            });
        </script>

    </div>

</body>

</html>
