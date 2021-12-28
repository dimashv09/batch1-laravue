  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('/')}}" class="brand-link">
      <img src="{{asset('vendor/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">{{ config('app.name', 'Laravel') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('vendor/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ucwords(Auth::user()->name)}}</a>
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
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="{{url('/home')}}" class="nav-link {{ request()->is('home') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{url('/transaction')}}" class="nav-link {{ request()->is('transaction') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-shopping-cart"></i>
                    <p>Peminjaman</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{url('/member')}}" class="nav-link {{ request()->is('member') ? 'active' : '' }}">
                    <i class="fas fa-id-card-alt nav-icon"></i>
                    <p>Anggota</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{url('/book')}}" class="nav-link {{ request()->is('book') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-book"></i>
                    <p>Buku</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{url('/catalog')}}" class="nav-link {{ request()->is('catalog') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-list"></i>
                    <p>Katalog</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{url('/publisher')}}" class="nav-link {{ request()->is('publisher') ? 'active' : '' }}">
                    <i class="fas fa-globe-asia nav-icon"></i>
                    <p>Penerbit</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{url('/writer')}}" class="nav-link {{ request()->is('writer') ? 'active' : '' }}">
                    <i class="fas fa-feather nav-icon"></i>
                    <p>Pengarang</p>
                </a>
            </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
