@include('admin.layouts.header')

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        @include('admin.layouts.navbar')

        @include('admin.layouts.sidebar')

        <!-------------------------------------- Main content ---------------------------------------->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Admin Dashboard</h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <div class="container mt-4">

                <div class="row justify-content-center">

                    <!-- Total Users -->
                    <div class="container mt-4">

                        <div class="row">

                            <!-- Users -->
                            <div class="col-lg-3 col-md-6 col-12 mb-3">
                                <div class="small-box bg-info dashboard-box">
                                    <div class="inner">
                                        <h3>{{ $totalUsers }}</h3>
                                        <p>Users</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-users"></i>
                                    </div>
                                    <a href="{{ route('admin.user-list') }}" class="small-box-footer">
                                        View details <i class="fas fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            </div>

                            <!-- Jobs -->
                            <div class="col-lg-3 col-md-6 col-12 mb-3">
                                <div class="small-box bg-info dashboard-box">
                                    <div class="inner">
                                        <h3>{{ $totalJobs }}</h3>
                                        <p>Jobs</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-briefcase"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">
                                        View details <i class="fas fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            </div>

                            <!-- Events -->
                            <div class="col-lg-3 col-md-6 col-12 mb-3">
                                <div class="small-box bg-info dashboard-box">
                                    <div class="inner">
                                        <h3>{{ $totalEvents }}</h3>
                                        <p>Events</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-calendar-alt"></i>
                                    </div>
                                    <a href="{{ route('admin.events') }}" class="small-box-footer">
                                        View details <i class="fas fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            </div>

                            <!-- Company -->
                            <div class="col-lg-3 col-md-6 col-12 mb-3">
                                <div class="small-box bg-info dashboard-box">
                                    <div class="inner">
                                        <h3>{{ $totalCompany }}</h3>
                                        <p>Company</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-building"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">
                                        View details <i class="fas fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-------------------------------------- Main content ---------------------------------------->
                </div>
            </div>
        </div>
    </div>

    @include('layout.footer')
</body>

</html>
