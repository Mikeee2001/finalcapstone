@include('admin.layouts.header')

<link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.css" rel="stylesheet" />
<link rel="stylesheet" href="{{ asset('css/calendar.css') }}">

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        @include('admin.layouts.navbar')
        @include('admin.layouts.sidebar')

        <!-- Content Wrapper -->
        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2 align-items-center">

                        <!-- Title -->
                        <div class="col-sm-6">
                            <h1 class="m-0">Events Calendar</h1>
                        </div>

                        <!-- Button -->
                        <div class="col-sm-6 text-right">
                            <a href="{{ route('admin.events') }}" class="btn btn-success">
                                <i class="fas fa-calendar-alt mr-1"></i> Events List
                            </a>
                        </div>

                    </div>
                </div>
            </section>

            <section class="content pt-3">
                <div class="container-fluid">

                    <div class="row justify-content-center">
                        <div class="col-lg-10">

                            <!-- Calendar Card -->
                            <div class="card">
                                <div class="card-body">

                                    <!-- Calendar -->
                                    <div id="calendar"></div>

                                    <!-- Legend (horizontal, below calendar) -->
                                    {{-- <div class="mt-4 d-flex justify-content-center align-items-center">
                                        <strong class="mr-3">Legend:</strong>
                                        <span class="badge"
                                            style="background-color: green; color: #fff; padding: 8px; margin-right: 15px;">
                                            Completed
                                        </span>
                                        <span class="badge"
                                            style="background-color: red; color: #fff; padding: 8px; margin-right: 15px;">
                                            Ongoing
                                        </span>
                                        <span class="badge"
                                            style="background-color: purple; color: #fff; padding: 8px;">
                                            Upcoming
                                        </span>
                                    </div> --}}

                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </section>

        </div>

        @include('layout.footer')

    </div>

    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                height: 'auto',
                expandRows: true,

                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
                },

                events: "{{ url('/admin/get-events') }}",

                editable: true,
                selectable: true,
                eventDisplay: 'block',
                eventTextColor: '#fff'
            });

            calendar.render();
        });
    </script>

</body>

</html>
