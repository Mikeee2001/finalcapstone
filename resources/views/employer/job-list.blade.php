@include('employer.layout.header')

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
                            <button class="btn btn-primary float-right" data-toggle="modal"
                                data-target="#addAccountModal">
                                Add Job
                            </button>
                        </div>
                        <div class="card-body">
                            <table id="usersTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr class="text-center">

                                        <td>No.</td>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>location</th>
                                        <th>salary_min</th>
                                        <th>salary_max</th>
                                        <th>job_type</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @foreach ($users as $user)
                                        <tr class="text-center">
                                        </tr>
                                    @endforeach --}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <!-------------------------------------- Main content ---------------------------------------->

  @include('layout.footer')
</body>
</html>
