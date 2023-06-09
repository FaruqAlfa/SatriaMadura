<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sistem Informasi Supplier</title>
  @include('layoutsSuplier.css')

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src= {{ asset('img/logoPT.png') }}  alt="AdminLTELogo" height="100" width="100">
  </div>

  <!-- Navbar -->
  @include('layoutsSuplier.navbarSupplier')
  <!-- /.navbar -->

  <!-- Sidebar -->
 @include('layoutsSuplier.sidebarSupplier')
  <!-- /.Sidebar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content p-5">
      @yield('content')
    </section>
    <!-- /.content -->
  </div>
  
<!-- Footer -->
@include('layoutsSuplier.footerSupplier')
<!-- /.footer -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

@include('layoutsSuplier.js')
</body>
</html>
