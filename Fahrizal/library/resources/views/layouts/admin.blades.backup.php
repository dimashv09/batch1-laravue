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
					<a href="index3.html" class="nav-link">Home</a>
				</li>
				<li class="nav-item d-none d-sm-inline-block">
					<a href="#" class="nav-link">Contact</a>
				</li>
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
							<a href="{{ route( 'transaction.show', ['transaction' => $data['transaction'] ] )}}"
								class="dropdown-item">
								<i class="fas fa-exclamation-circle mr-2"></i> {{ $data["member"] }} haven't returned
								the book yet
								<p class="text-muted text-sm">{{ $data["delay"] }} days</p>
							</a>
							<div class="dropdown-divider"></div>
							@endforeach
							@if (count(late_notification()))
							<a href="#" class="dropdown-item dropdown-footer">Total {{ count(late_notification()) }}
								data</a>
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
			<a href="index3.html" class="brand-link">
				<img src="{{ asset('assets/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
					class="brand-image img-circle elevation-3" style="opacity: .8">
				<span class="brand-text font-weight-light">Library</span>
			</a>

			<!-- Sidebar -->
			<div class="sidebar">
				<!-- Sidebar user panel (optional) -->
				<div class="user-panel mt-3 pb-3 mb-3 d-flex">
					<div class="image">
						{{-- @if (Auth::user()->avatar) --}}
						{{-- <img src="{{ Auth::user()->avatar }}" referrerPolicy="no-referrer"
							class="user-photo rounded-circle" alt=""> --}}
						{{-- @else --}}
						<img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}"
							referrerPolicy="no-referrer" class="user-photo rounded-circle" alt="">
						{{-- @endif --}}
						{{-- <img src="{{ asset('assets/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
							alt="User Image"> --}}
					</div>
					<div class="info">
						<a href="#" class="d-block">{{ Auth::user()->name }}</a>
					</div>
				</div>

				<!-- SidebarSearch Form -->
				<div class="form-inline">
					<div class="input-group" data-widget="sidebar-search">
						<input class="form-control form-control-sidebar" type="search" placeholder="Search"
							aria-label="Search">
						<div class="input-group-append">
							<button class="btn btn-sidebar">
								<i class="fas fa-search fa-fw"></i>
							</button>
						</div>
					</div>
				</div>

				<!-- Sidebar Menu -->
				<nav class="mt-2">
					<ul class="nav nav-pills nav-sidebar flex-column" role="menu" data-accordion="false">
						<!-- Add icons to the links using the .nav-icon class
						with font-awesome or any other icon font library -->
						<li class="nav-item">
							<a href="{{ url('dashboard') }}"
								class="nav-link {{ (request()->is('dashboard')) ? 'active' : '' }}">
								<i class="nav-icon fas fa-tachometer-alt"></i>
								<p>Dashboard</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ url('transactions') }}"
								class="nav-link {{ (request()->is('transactions*')) ? 'active' : '' }}">
								<i class="nav-icon fas fa-cash-register"></i>
								<p>Transactions</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ url('catalogs') }}"
								class="nav-link {{ (request()->is('catalogs*')) ? 'active' : '' }}">
								<i class="nav-icon fas fa-tags"></i>
								<p>Catalogs</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ url('publishers') }}"
								class="nav-link {{ (request()->is('publishers*')) ? 'active' : '' }}">
								<i class="nav-icon fas fa-hand-holding-usd"></i>
								<p>Publishers</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ url('authors') }}"
								class="nav-link {{ (request()->is('authors*')) ? 'active' : '' }}">
								<i class="nav-icon fas fa-pen-nib"></i>
								<p>Authors</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ url('books') }}"
								class="nav-link {{ (request()->is('books*')) ? 'active' : '' }}">
								<i class="nav-icon fas fa-book"></i>
								<p>Books</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ url('members') }}"
								class="nav-link {{ (request()->is('members*')) ? 'active' : '' }}">
								<i class="nav-icon fas fa-users"></i>
								<p>Members</p>
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
							<h1 class="m-0">@yield('wrapper-title', 'Dashboard')</h1>
						</div><!-- /.col -->
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item"><a href="{{ request()->route()->uri }}">{{
										Route::currentRouteName() }}</a></li>
								<li class="breadcrumb-item active">Admin</li>
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
				<b>Version</b> 3.1.0
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
		$.widget.bridge('uibutton', $.ui.button)
	</script>
	<!-- Bootstrap 4 -->
	<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
	<!-- overlayScrollbars -->
	<script src="{{ asset('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
	<!-- Summernote -->
	<script src="{{ asset('assets/plugins/summernote/summernote-bs4.min.js') }}"></script>
	<!-- AdminLTE App -->
	<script src="{{ asset('assets/dist/js/adminlte.js') }}"></script>
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
	@yield('js')
</body>

</html>