@include('admin.layouts.header')

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        @include('admin.layouts.navbar')

        @include('admin.layouts.sidebar')

        <!-------------------------------------- Main content ---------------------------------------->
        <!DOCTYPE html>
        <html>

        <head>
            <link rel="stylesheet" href="{{ asset('css/calendar.css') }}">
        </head>

        <div class="container-fluid">
            <!-- Buttons aligned right -->
            <div class="d-flex justify-content-end mb-3 gap-2">
                <a href="{{ route('admin.events') }}" class="btn btn-success">Events List</a>
            </div>

            <!-- Calendar full width, no scroll -->
            <div id="calendar" class="bg-white p-3 rounded shadow-sm"></div>
        </div>


        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var calendarEl = document.getElementById('calendar');

                var calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'dayGridMonth',
                    headerToolbar: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'dayGridMonth,timeGridWeek,timeGridDay'
                    },
                    events: '{{ url('/admin/get-events') }}', // fetch events from Laravel backend
                    editable: true, // allow drag & drop
                    selectable: true, // allow selecting dates
                });

                calendar.render();
            });
        </script>
        <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var calendarEl = document.getElementById('calendar');
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'dayGridMonth',
                    heigt: 'auto',
                    expandRows: true,
                    headerToolbar: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
                    },
                    events: '{{ url('/admin/get-events') }}',
                    editable: true,
                    selectable: true,
                    eventDisplay: 'block',
                    eventTextColor: '#fff'
                });
                calendar.render();
            });
        </script>'
        <!-------------------------------------- Main content ---------------------------------------->

    </div>

    @include('layout.footer')
</body>

</html>
