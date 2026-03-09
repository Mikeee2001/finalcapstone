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
                                    {{-- @foreach ($jobs as $job)
                                        <tr class="text-center">
                                            <th></th>
                                        </tr>
                                    @endforeach --}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal for Adding New Job -->
        <!-- Modal for Adding New Job -->
        <div class="modal fade" id="addJobModal" tabindex="-1" role="dialog" aria-labelledby="addJobModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document"> <!-- modal-lg for wider layout -->
                <div class="modal-content">

                    <!-- Header -->
                    <div class="modal-header">
                        <h5 class="modal-title" id="addJobModalLabel">Add Job</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                    </div>

                    <!-- Form -->
                    <form id="addJobForm" class="form-horizontal">
                        @csrf
                        <div class="modal-body">

                            <!-- Job Title -->
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Job Title</label>
                                <div class="col-sm-9">
                                    <input type="text" name="title" class="form-control" required>
                                    <span class="text-danger error-text title_error"></span>
                                </div>
                            </div>

                            <!-- Description -->
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Job Description</label>
                                <div class="col-sm-9">
                                    <textarea name="description" class="form-control" required></textarea>
                                    <span class="text-danger error-text description_error"></span>
                                </div>
                            </div>

                            <!-- Location -->
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Location</label>
                                <div class="col-sm-9">
                                    <input type="text" name="location" class="form-control" required>
                                    <span class="text-danger error-text location_error"></span>
                                </div>
                            </div>

                            <!-- Salary Range -->
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Minimum Salary</label>
                                <div class="col-sm-9">
                                    <input type="number" name="salary_min" class="form-control">
                                    <span class="text-danger error-text salary_min_error"></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Maximum Salary</label>
                                <div class="col-sm-9">
                                    <input type="number" name="salary_max" class="form-control">
                                    <span class="text-danger error-text salary_max_error"></span>
                                </div>
                            </div>

                            <!-- Job Type -->
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Job Type</label>
                                <div class="col-sm-9">
                                    <select name="job_type" class="form-control" required>
                                        <option value="full-time">Full‑Time</option>
                                        <option value="part-time">Part‑Time</option>
                                    </select>
                                    <span class="text-danger error-text job_type_error"></span>
                                </div>
                            </div>

                            <!-- Skills -->
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Required Skills</label>
                                <div class="col-sm-9">
                                    <select name="skills[]" class="form-control" multiple required>
                                        @foreach ($skills as $skill)
                                            <option value="{{ $skill->id }}">{{ $skill->skill_name }}</option>
                                        @endforeach
                                    </select>
                                    <small class="form-text text-muted">Add one or more skills required for this
                                        job.</small>
                                    <span class="text-danger error-text skills_error"></span>
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

        <!-- AJAX for Adding New Job Post -->
        <script>
            $(document).ready(function() {
                $('#addUserForm').on('submit', function(e) {
                    e.preventDefault();

                    let formData = new FormData(this);

                    // Clear previous errors
                    $('span.error-text').text('');

                    $.ajax({
                        url: "{{ route('add-user') }}",
                        method: 'POST',
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function(response) {
                            if (response.success === true) {
                                // ✅ Close modal
                                $('#addAccountModal').modal('hide');

                                // ✅ Reset form
                                $('#addUserForm')[0].reset();

                                // ✅ Show success toast
                                toastr.success('User account has been registered successfully!');
                                location.reload();

                            } else {
                                toastr.error('Something went wrong. Please try again.');
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

        <!-- CSS -->
        <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('dist/css/select2.min.css') }}">

        <!-- jQuery -->
        <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>

        <!-- DataTables JS -->
        <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>

        <!-- Select2 JS -->
        <script src="{{ asset('dist/js/select2.min.js') }}"></script>

        <!-- Toastr JS -->
        <script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>

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

                // Select2 init
                $('#skills').select2({
                    placeholder: "Select required skills",
                    allowClear: true,
                    width: '100%'
                });

                // Toastr example
                toastr.options = {
                    closeButton: true,
                    progressBar: true
                };
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


    </div>

</body>

</html>
