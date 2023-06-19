<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="img/logoPTreal.jpg" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Satria Madura</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="img/logoPTreal.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"> {{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="true">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">

            <a href="{{ route('dashboardAdmin') }}" class="nav-link">

          
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Produksi
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="" class="nav-link">
              <img src="img/gudang.png" class="nav-icon">
              <p>
                Gudang
                <i class="right fas fa-angle-left"></i>

              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <img src="img/location.png" class="nav-icon">
              <p>
                Dsitribusi
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Pembukuan
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('staffAll') }}" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Data Karyawan
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <a class="nav-link" href="{{ route('logoutAdmin')}}">
              Logout
            </a>
          </li>
      </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>