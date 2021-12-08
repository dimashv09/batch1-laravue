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
            <a class="navbar-brand" href="{{url('/')}}"><img src="{{asset('vendor/landing/images/logo.png')}}" alt="logo"></a>
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
                        <a class="nav-link page-scroll" href="{{url('/#feature')}}">Feature</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('about')}}">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('service')}}">Service</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="{{url('/#team')}}">Team</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="{{url('/#pricing')}}">Pricing</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/contact')}}">Contact</a>
                    </li>
                    @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/home')}}">Dashboard</a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('login')}}">Login</a>
                    </li>
                    </ul>
                        <a href="#" class="btn btn-primary ml-lg-3 primary-shadow">Register Now</a>
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
                <!-- logo -->
                    <a href="index.html">
                        <img class="img-fluid" src="{{asset('vendor/landing/images/logo.png')}}" alt="logo">
                    </a>
                </div>
                <!-- footer menu -->
                <nav class="col-lg-8 align-self-center mb-5">
                    <ul class="list-inline text-lg-right text-center footer-menu">
                        <li class="list-inline-item active"><a href="index.html">Home</a></li>
                        <li class="list-inline-item"><a class="page-scroll" href="#feature">Feature</a></li>
                        <li class="list-inline-item"><a href="about.html">About</a></li>
                        <li class="list-inline-item"><a class="page-scroll" href="#team">Team</a></li>
                        <li class="list-inline-item"><a class="page-scroll" href="#pricing">Pricing</a></li>
                        <li class="list-inline-item"><a href="contact.html">Contact</a></li>
                    </ul>
                </nav>
                <!-- footer social icon -->
                <nav class="col-12">
                <ul class="list-inline text-lg-right text-center social-icon">
                    <li class="list-inline-item">
                        <a class="facebook" href="#"><i class="ti-facebook"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a class="twitter" href="#"><i class="ti-twitter-alt"></i></a>
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
