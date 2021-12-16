<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <!-- mobile responsive meta -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <!-- Bootstrap -->
        <link rel="stylesheet" href="{{asset('vendor/landing/plugins/bootstrap/bootstrap.min.css')}}">
        <!-- themefy-icon -->
        <link rel="stylesheet" href="{{asset('vendor/landing/plugins/themify-icons/themify-icons.css')}}">
        <!-- slick slider -->
        <link rel="stylesheet" href="{{asset('vendor/landing/plugins/slick/slick.css')}}">
        <!-- venobox popup -->
        <link rel="stylesheet" href="{{asset('vendor/landing/plugins/Venobox/venobox.css')}}">
        <!-- aos -->
        <link rel="stylesheet" href="{{asset('vendor/landing/plugins/aos/aos.css')}}">

        <!-- Main Stylesheet -->
        <link href="{{asset('vendor/landing/css/style.css')}}" rel="stylesheet">
        <!--Favicon-->
        <link rel="shortcut icon" href="{{asset('vendor/landing/images/favicon.ico')}}" type="image/x-icon">
        <link rel="icon" href="{{asset('vendor/landing/images/favicon.ico')}}" type="image/x-icon">

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
<body>
    <section class="fixed-top navigation">
        <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <h4 class="brand">SISTEM MANAJEMEN PERPUSTAKAAN</h4>
            <button class="navbar-toggler border-0" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <!-- navbar -->
            <div class="collapse navbar-collapse text-center" id="navbar">
                @if (Route::has('login'))
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/')}}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="{{url('/#feature')}}">Fitur</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('about')}}">Tentang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="{{url('/#team')}}">Developer</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/contact')}}">Kontak</a>
                    </li>
                    @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/home')}}">Dashboard</a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('login')}}">Masuk</a>
                    </li>
                    </ul>
                    @endauth
                    @endif
                </div>
            </nav>
        </div>
    </section>

    @yield('content')

    <!-- footer -->
    <footer class="footer-section footer" style="background-image: url({{asset('vendor/landing/images/backgrounds/footer-bg.png')}});">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 text-center text-lg-left mb-4 mb-lg-0">
                    <h5>Sistem Manajemen Perpustakaan</h5>
                </div>
                <!-- footer menu -->
                <nav class="col-lg-8 align-self-center mb-5">
                    <ul class="list-inline text-lg-right text-center footer-menu">
                        <li class="list-inline-item active"><a href="{{url('/')}}">Home</a></li>
                        <li class="list-inline-item"><a class="page-scroll" href="{{url('/#feature')}}">Fitur</a></li>
                        <li class="list-inline-item"><a href="{{url('about')}}">Tentang</a></li>
                        <li class="list-inline-item"><a class="page-scroll" href="{{url('/#team')}}">Developer</a></li>
                        <li class="list-inline-item"><a href="{{url('/contact')}}">Kontak</a></li>
                    </ul>
                </nav>
                <!-- footer social icon -->
                <nav class="col-12">
                <ul class="list-inline text-lg-right text-center social-icon">
                    <li class="list-inline-item">
                        <a class="facebook" href="#"><i class="ti-facebook"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a class="linkedin" href="#"><i class="ti-linkedin"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a class="black" href="#"><i class="ti-github"></i></a>
                    </li>
                </ul>
                </nav>
            </div>
        </div>
    </footer>
  <!-- /footer -->

  <!-- jQuery -->
  <script src="{{asset('vendor/landing/plugins/jQuery/jquery.min.js')}}"></script>
  <!-- Bootstrap JS -->
  <script src="{{asset('vendor/landing/plugins/bootstrap/bootstrap.min.js')}}"></script>
  <!-- slick slider -->
  <script src="{{asset('vendor/landing/plugins/slick/slick.min.js')}}"></script>
  <!-- venobox -->
  <script src="{{asset('vendor/landing/plugins/Venobox/venobox.min.js')}}"></script>
  <!-- aos -->
  <script src="{{asset('vendor/landing/plugins/aos/aos.js')}}"></script>
  <!-- Main Script -->
  <script src="{{asset('vendor/landing/js/script.js')}}"></script>
  @stack('script')
</body>
</html>
