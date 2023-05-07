<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="/../../assets/user/images/logo/logo-perbasi.png" alt="Perbasi Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">PERBASI INDRAMAYU</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Panitia</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="pages/dashboard.html" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-header">COMPONENT</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Manajement
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/charts/chartjs.html" class="nav-link">
                  <i class="nav-icon fas fa-solid fa-users"></i>
                  <p>Pelatih</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-list-alt"></i>
              <p>
                Content
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/charts/chartjs.html" class="nav-link">
                  <i class="nav-icon far fa-file-alt"></i>
                  <p>Data Tentang Event</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/event" class="nav-link">
                  <i class="nav-icon far fa-file-alt"></i>
                  <p>Data Event</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/kategorievent" class="nav-link">
                  <i class="nav-icon far fa-file-alt"></i>
                  <p>Data kategori Event</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/jeniscabangevent" class="nav-link">
                  <i class="nav-icon far fa-file-alt"></i>
                  <p>Data Jenis Cabang Event</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="pages/dashboard.html" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Data persyaratan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('logout') }}" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>Logout</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>