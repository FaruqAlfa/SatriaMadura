@extends('Tambah.includeAdmin')

<<<<<<< HEAD
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left mt-4">
            <h2 style="text-align: center">Dashboard Admin</h2>
        </div>
        
    </div>
=======
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="img/logoPT.png" alt="AdminLTELogo" height="100" width="100">
  </div>

  <!-- Navbar -->
  @include('layoutsAdmin.navbarAdmin')
  <!-- /.navbar -->

  <!-- Sidebar -->
 @include('layoutsAdmin.sidebarAdmin')
  <!-- /.Sidebar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard Admin</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      @yield('staff')
    </section>
    <!-- /.content -->
  </div>
  
<!-- Footer -->
@include('layoutsAdmin.footerAdmin')
<!-- /.footer -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
>>>>>>> 633e2af10d865d6b474ff93618e5fe59ed72a7ef
</div>

<<<<<<< HEAD
@endsection
=======
@include('layoutsAdmin.js')
</body>
</html>
>>>>>>> 633e2af10d865d6b474ff93618e5fe59ed72a7ef
