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
                            <h3 class="card-title" style="font-size: 2em">Event Lists</h3>
                            <!-- Add New Event Button -->
                            <button class="btn btn-primary float-right" data-toggle="modal"
                                data-target="#addEventModal">
                                Add Event
                            </button>
                        </div>
                        <div class="card-body">
                            <table id="eventsTable" class="table table-sm table-bordered table-striped">
                                <thead>
                                    <tr class="text-center">
                                        <th>No.</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Location</th>
                                        <th>Start Time</th>
                                        <th>End Time</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($events as $event)
                                        <tr class="text-center">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $event->event_name }}</td>
                                            <td>{{ $event->description }}</td>
                                            <td>{{ $event->location }}</td>
                                            <td>{{ $event->start_time }}</td>
                                            <td>{{ $event->end_time }}</td>
                                            <td>{{ $event->status }}</td>
                                            <td>
                                                <a href="#', $event->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                                <form action="{{ route('admin.delete-event', $event->id) }}"
                                                    method="POST" style="display:inline;"
                                                    onsubmit="return confirm('Are you sure you want to delete this event?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">Delete
                                                        <i class="bi bi-trash"></i>
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

        <!-- Modal for Adding New Events -->
        <div class="modal fade" id="addEventModal" tabindex="-1" role="dialog" aria-labelledby="addEventModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">

                    <!-- Header -->
                    <div class="modal-header">
                        <h5 class="modal-title" id="addEventModalLabel">Add New Event</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <!-- Form -->
                    <form id="addEventForm" class="form-horizontal">
                        @csrf
                        <div class="modal-body">

                            <!-- Event Name -->
                            <div class="form-group row">
                                <label for="eventName" class="col-sm-3 col-form-label">Event Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="eventName" name="event_name"
                                        placeholder="Enter Event name" required>
                                    <span class="text-danger error-text event_name_error"></span>
                                </div>
                            </div>

                            <!-- Description -->
                            <div class="form-group row">
                                <label for="description" class="col-sm-3 col-form-label">Description</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" id="description" name="description" placeholder="Enter description"></textarea>
                                    <span class="text-danger error-text description_error"></span>
                                </div>
                            </div>

                            <!-- Location -->
                            <div class="form-group row">
                                <label for="location" class="col-sm-3 col-form-label">Location</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="location" name="location"
                                        placeholder="Enter location" required>
                                    <span class="text-danger error-text location_error"></span>
                                </div>
                            </div>

                            <!-- Start Date & Time -->
                            <div class="form-group row">
                                <label for="startTime" class="col-sm-3 col-form-label">Start Date & Time</label>
                                <div class="col-sm-9">
                                    <input type="datetime-local" class="form-control" id="startTime" name="start_time"
                                        min="{{ now()->format('Y-m-d\TH:i') }}" required>
                                    <span class="text-danger error-text start_time_error"></span>
                                </div>
                            </div>

                            <!-- End Date & Time -->
                            <div class="form-group row">
                                <label for="endTime" class="col-sm-3 col-form-label">End Date & Time</label>
                                <div class="col-sm-9">
                                    <input type="datetime-local" class="form-control" id="endTime" name="end_time"
                                        required>
                                    <span class="text-danger error-text end_time_error"></span>
                                </div>
                            </div>

                            <!-- Status -->
                            <div class="form-group row">
                                <!-- Status -->
                                <label for="status" class="col-sm-3 col-form-label">Status</label>
                                <div class="col-sm-3">
                                    <select class="form-control" id="status" name="status" required>
                                        <option value="upcoming">Upcoming</option>
                                        <option value="ongoing">Ongoing</option>
                                        {{-- <option value="completed">Completed</option> --}}
                                    </select>
                                </div>

                                <!-- Color -->
                                <label for="color" class="col-sm-3 col-form-label">Color</label>
                                <div class="col-sm-3">
                                    <select class="form-control" id="color" name="color" required>
                                        <option value="red">Red</option>
                                        <option value="purple">Purple</option>
                                        {{-- <option value="green">Green</option> --}}
                                    </select>
                                </div>
                            </div>

                        </div>

                        <!-- Footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add Event</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>

    </div>

    @include('layout.footer')

    <!-- AJAX for Adding New User Account -->
    <script>
        $(document).ready(function() {
            $('#addEventForm').on('submit', function(e) {
                e.preventDefault();

                let formData = new FormData(this);

                // Clear previous errors
                $('span.error-text').text('');

                $.ajax({
                    url: "{{ route('admin.events.create') }}",
                    method: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response.success === true) {
                            // ✅ Close modal
                            $('#addEventModal').modal('hide');

                            // ✅ Reset form
                            $('#addEventForm')[0].reset();

                            // ✅ Show success toast
                            toastr.success('Event has been created successfully!');
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

    {{-- Events List Page Script --}}
    <script>
        $(document).ready(function() {
            $('#eventsTable').DataTable({
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

    {{-- Color and Status Synchronization Script --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const statusSelect = document.getElementById('status');
            const colorSelect = document.getElementById('color');

            function updateColors() {
                const status = statusSelect.value;

                colorSelect.innerHTML = ''; // clear existing options

                if (status === 'completed') {
                    colorSelect.innerHTML = '<option value="green">Green</option>';
                } else if (status === 'ongoing') {
                    colorSelect.innerHTML = '<option value="red">Red</option>';
                } else if (status === 'upcoming') {
                    colorSelect.innerHTML = '<option value="purple">Purple</option>';
                }
            }
            // Run once on load
            updateColors();
            // Update whenever status changes
            statusSelect.addEventListener('change', updateColors);
        });
    </script>

    {{-- Start and End Time Validation Script --}}
    <Script>
        document.addEventListener('DOMContentLoaded', function() {
            const startInput = document.getElementById('startTime');
            const endInput = document.getElementById('endTime');

            startInput.addEventListener('change', function() {
                // Set the minimum end time to the selected start time
                endInput.min = startInput.value;

                // If end time is earlier than start time, reset it
                if (endInput.value && endInput.value < startInput.value) {
                    endInput.value = startInput.value;
                }
            });
        });
    </Script>

</body>

</html>
