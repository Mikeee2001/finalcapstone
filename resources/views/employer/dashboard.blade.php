@include('employer.layout.header')

<body class="hold-transition sidebar-mini">
  <div class="wrapper">

    @include('employer.layout.navbar')

    @include('employer.layout.sidebar')

    <!-------------------------------------- Main content ---------------------------------------->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Employer Dashboard</h1>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

    </div>
    <!-------------------------------------- Main content ---------------------------------------->

  @include('layout.footer')
</body>
</html>
