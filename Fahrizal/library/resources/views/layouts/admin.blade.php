<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin | @yield('title')</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dist/css/fahri.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    @yield('css')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Preloader -->
        <!-- <div class="preloader flex-column justify-content-center align-items-center">
			<img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
		</div> -->

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
<li class="nav-item">
<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
</li>
<li class="nav-item d-none d-sm-inline-block">
<a href="home" class="nav-link">Home</a>
</li>
<li class="nav-item d-none d-sm-inline-block">
<a href="#" class="nav-link">Contact</a>
</li>
</ul>
<ul class="navbar-nav ml-auto">
</ul>



            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search"
                                    aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                </li>
                <li class="nav-item">
				<a class="nav-link" data-widget="fullscreen" href="#" role="button">
				<i class="fas fa-expand-arrows-alt"></i>
				</a>
			</li>
            
			<li class="nav-item">
				<a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-bell"></i>
                    @if (count(late_notification()))
                    <span class="badge badge-warning navbar-badge">{{ count(late_notification()) }}</span>
                    @endif
                    <div class="dropdown-menu dropdown-menu-xl dropdown-menu-right w-auto">
                        <span class="dropdown-item dropdown-header">Notification</span>
                        <div class="dropdown-divider"></div>
                        @foreach (late_notification() as $data)
                        <a href="{{ route( 'transaction.show', ['transaction' => $data['transaction'] ] )}}" class="dropdown-item">
                            <i class="fas fa-exclamation-circle mr-2"></i> {{ $data["member"] }} haven't returned the book yet
                            <p class="text-muted text-sm">{{ $data["delay"] }} days</p>
                        </a>
                        <div class="dropdown-divider"></div>
                        @endforeach
                        @if (count(late_notification()))
                            <a href="#" class="dropdown-item dropdown-footer">Total {{ count(late_notification()) }} data</a>
                        @else
                            <a href="#" class="dropdown-item dropdown-footer">No data found</a>
                        @endif
                    </div>
                </a>
			</li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}"
                        onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->



        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="home" class="brand-link">
                <img src="https://ih1.redbubble.net/image.1788133237.8111/st,small,507x507-pad,600x600,f8f8f8.jpg" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">TETSUYA KUMIKO</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ asset('assets/dist/img/yoimiya.png')}}" class="img-circle elvation-2"
                            alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">{{ Auth::user()->name }}</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
						with font-awesome or any other icon font library -->

                        <li class="nav-item menu-open">
                            <a href="{{ url('home') }}" class="nav-link {{ request()->is('home') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-user"></i>
                                <p>
                                    Home
                                </p>
                            </a>
                        </li>
                        <li class="nav-item menu-open">
                            <a href="{{ url('members') }}" class="nav-link {{ request()->is('members') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-users"></i>
                                <p>
                                    Member
                                </p>
                            </a>
                        </li>
                        <li class="nav-item menu-open">
                            <a href="{{ url('books') }}" class="nav-link {{ request()->is('book') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-book"></i>
                                <p>
                                    Book
                                </p>
                            </a>
                        </li>
                        <li class="nav-item menu-open">
                            <a href="{{ url('catalogs') }}" class="nav-link {{ request()->is('catalogs') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Catalog
                                </p>
                            </a>
                        </li>
                        <li class="nav-item menu-open">
                            <a href="{{ url('authors') }}" class="nav-link {{ request()->is('authors') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-copy"></i>
                                <p>
                                    Author
                                </p>
                            </a>
                        </li>
                        <li class="nav-item menu-open">
                            <a href="{{ url('publishers') }}" class="nav-link {{ request()->is('publishers') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-chart-pie"></i>
                                <p>
                                    Publisher
                                </p>
                            </a>
                        </li>
                        <li class="nav-item menu-open">
                            <a href="{{ url('transactions') }}" class="nav-link {{ request()->is('transactions') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-cash-register"></i>
                                <p>
                                    Transaction
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a>{{ Auth::user()->name }}</a></li>
<li class="breadcrumb-item active">@yield('header')</li>
</ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    @yield('content')
                    <!-- /.row (main row) -->
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.2.0
            </div>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton'), $.ui.buo
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- Summernote -->
    <script src="{{ asset('assets/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- Vue js -->
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14"></script>
    <!-- Axios -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <!-- SA2 -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- ChartJS -->
    <script src="{{ asset('assets/plugins/chart.js/Chart.min.js') }}"></script>
    <!-- Select2 -->
    <script src="{{ asset('assets/plugins/select2/js/select2.full.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('assets/dist/js/adminlte.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.min.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    @yield('js')
</body>

</html>