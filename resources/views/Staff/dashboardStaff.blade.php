<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>dashboard Staff</title>
  @include('Staff.layoutsStaff.css')


</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{ asset('img/logoPT.png') }}" alt="AdminLTELogo" height="100" width="100">
  </div>

  <!-- Navbar -->
  @include('Staff.layoutsStaff.navbarStaff')
  <!-- /.navbar -->

  <!-- Sidebar -->
  @include('Staff.layoutsStaff.sidebarStaff')
  <!-- /.Sidebar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="wrapper">
  
    <div class="content-wrapper">
      @yield('content')
    </div>
  
  </div>
  
<!-- Footer -->
@include('Staff.layoutsStaff.footerStaff')
<!-- /.footer -->

@include('Staff.layoutsStaff.js')
</body>
</html>
