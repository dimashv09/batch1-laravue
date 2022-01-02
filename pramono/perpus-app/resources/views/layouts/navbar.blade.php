<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    @guest
        @if (Route::has('login'))

        <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
        </li>

        @endif

        @if (Route::has('register'))

        <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
        </li>

        @endif
    @else
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{url('/home')}}" class="nav-link">Home</a>
            </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-bell"></i>
                @if (count(pinjamanTelat()))
                <span class="badge badge-warning navbar-badge">{{ count(pinjamanTelat()) }}</span>
                @endif
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-item dropdown-header">Pengembalian Telat</span>
            <div class="dropdown-divider"></div>
            @foreach (pinjamanTelat() as $data)
            <a href="{{ route( 'transaction.show', ['transaction' => $data['transaction'] ] )}}" class="dropdown-item">
                <i class="fas fa-book mr-2"></i> {{ $data["member"] }}
                <span class="float-right text-muted text-sm">{{ $data["delay"] }} Hari</span>
            </a>
            <div class="dropdown-divider"></div>
            @endforeach
                @if (count(pinjamanTelat()))
                    <a href="#" class="dropdown-item dropdown-footer">Total {{ count(pinjamanTelat()) }} data</a>
                @else
                    <a href="#" class="dropdown-item dropdown-footer">belum ada data</a>
                @endif
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                    <i class="fas fa-power-off text-danger"></i>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>
        </ul>
    @endguest
</nav>
