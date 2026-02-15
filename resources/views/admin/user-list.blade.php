@include('admin.layouts.header')

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        @include('admin.layouts.navbar')

        @include('admin.layouts.sidebar')

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
                            <h3 class="card-title" style="font-size: 2em">User's List</h3>
                            <!-- Add New Account Button -->
                            <button class="btn btn-primary float-right" data-toggle="modal"
                                data-target="#addAccountModal">
                                Add User Account
                            </button>
                        </div>
                        <div class="card-body">
                            <table id="usersTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr class="text-center">

                                        <td>No.</td>
                                        <th>Full Name</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>Role</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr class="text-center">

                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $user->full_name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->status }}</td>
                                            <td>{{ $user->role_as }}</td>
                                            <td>

                                                <form action="{{ route('admin.delete-user', $user->id) }}"
                                                    method="POST" style="display:inline;"
                                                    onsubmit="return confirm('Are you sure you want to delete this user?');">

                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit" class="btn btn-danger">
                                                        Delete
                                                    </button>
                                                </form>

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

        <!-- Modal for Adding New Account -->
        <div class="modal fade" id="addAccountModal" tabindex="-1" role="dialog"
            aria-labelledby="addAccountModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addAccountModalLabel">Add User Account</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="addUserForm">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="fullName">Full Name</label>
                                <input type="text" class="form-control" placeholder="Enter Full name" id="fullName"
                                    name="full_name" required>
                                <span class="text-danger error-text full_name_error"></span>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" placeholder="Enter email" id="email"
                                    name="email" required>
                                <span class="text-danger error-text email_error"></span>
                            </div>

                            <div class="form-group">
                                <label for="role_as">Role</label>
                                <select class="form-control" id="role_as" name="role_as" required>
                                    <option value="" disabled selected>Select role</option>
                                    <option value="admin">Admin</option>
                                    <option value="employer">Employer</option>
                                    <option value="jobseeker">Jobseeker</option>
                                </select>
                                <span class="text-danger error-text role_as_error"></span>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" placeholder="Enter password" id="password"
                                    name="password" required>
                                <span class="text-danger error-text password_error"></span>
                            </div>
                            <div class="form-group">
                                <label for="confirmPassword">Confirm Password</label>
                                <input type="password" class="form-control" placeholder="Enter confirm password"
                                    id="confirmPassword" name="password_confirmation" required>
                                <span class="text-danger error-text password_confirmation_error"></span>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add Account</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        @include('layout.footer')
    </div>

    <!-- AJAX for Adding New User Account -->
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

    <script>
        $(document).ready(function() {
            $('#usersTable').DataTable({
                paging: true,
                searching: true,
                ordering: true,
                columnDefs: [{
                    orderable: false,
                    targets: 5
                }]
            });
        });
    </script>

    <!-- Include DataTables CSS and JS -->
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>

    <!-- Toastr -->

    <script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>

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

</body>

</html>
