@extends('layouts.landing')
@section('content')
    <!-- about us -->
<section class="section-lg about pb-0">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h2 class="section-title">About us</h2>
        </div>
        <div class="col-lg-12 mb-100">
          <p>Readdle redefines personal productivity and shapes the "future of work" by crea
            outstanding apps and services. Popular Readdle apps such as Scanner Pro, PDF
            Expert, Spark and Documents, were downloaded over 90 million times worldwide.</p>
          <p>Readdle apps shaped mobile software categories, such as document scanning
            (Scanner Pro), email (Spark), document management (Documents), PDF editing
            (PDF Expert) and calendaring (Calendars 5). We've also won numerous awards,
            got to the top positions on the App Store charts and, most importantly, are loved
            by millions of people.</p>
        </div>
        <div class="col-lg-12">
          <!-- about video -->
          <div class="about-video">
            <img class="img-fluid w-100" src="{{asset('vendor/landing/images/about/video-thumb.jpg')}}" alt="video-thumb">
            <a class="venobox play-btn" href="https://www.youtube.com/embed/2yoYxetUrWQ" data-vbtype="iframe"><i class="ti-control-play"></i></a>
          </div>
        </div>
      </div>
    </div>
    <!-- background shapes -->
    <img src="{{asset('vendor/landing/images/background-shape/green-dot.png')}}" alt="background-shape" class="about-bg-1 up-down-animation">
    <img src="{{asset('vendor/landing/images/background-shape/blue-dot.png')}}" alt="background-shape" class="about-bg-2 left-right-animation">
    <img src="{{asset('vendor/landing/images/background-shape/green-half-cycle.png')}}" alt="background-shape" class="about-bg-3 up-down-animation">
    <img src="{{asset('vendor/landing/images/background-shape/seo-ball-1.png')}}" alt="background-shape" class="about-bg-4 left-right-animation">
    <img src="{{asset('vendor/landing/images/background-shape/team-bg-triangle.png')}}" alt="background-shape" class="about-bg-5 up-down-animation">
    <img src="{{asset('vendor/landing/images/background-shape/service-half-cycle.png')}}" alt="background-shape" class="about-bg-6 left-right-animation">
  </section>
  <!-- /about us -->

  <!-- product -->
  <section class="section product" style="background-image: url({{asset('vendor/landing/images/backgrounds/about-bg.png')}});">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-12 text-center">
          <h2 class="section-title">Our Product</h2>
          <p class="mb-100">Far far away, behind the word mountains, far from the <br> countries Vokalia and Consonantia.</p>
        </div>
        <div class="col-md-4 col-sm-6 mb-50">
          <a href="#"><img src="{{asset('vendor/landing/images/product/product-1.jpg')}}" alt="product-img" class="rounded w-100 img-fluid"></a>
        </div>
        <div class="col-md-4 col-sm-6 mb-50">
          <a href="#"><img src="{{asset('vendor/landing/images/product/product-2.jpg')}}" alt="product-img" class="rounded w-100 img-fluid"></a>
        </div>
        <div class="col-md-4 col-sm-6 mb-50">
          <a href="#"><img src="{{asset('vendor/landing/images/product/product-3.jpg')}}" alt="product-img" class="rounded w-100 img-fluid"></a>
        </div>
        <div class="col-12 text-center">
          <a href="#" class="btn btn-primary">Explore More Product</a>
        </div>
      </div>
    </div>

    <!-- our vision -->
  <section class="section">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h2 class="section-title">Our Vision</h2>
          <p>Far far away, behind the word mountains,
            far from the countries Vokalia and Consonantia,
            there live the blind texts. Separated they
            live in Bookmarksgrove right at the coast of the
            Semantics, a large language ocean.</p>
        </div>
        <div class="col-md-6">
          <img src="{{asset('vendor/landing/images/about/vision.png')}}" alt="vision" class="img-fluid w-100">
        </div>
      </div>
    </div>
  </section>
  <!-- /our vision -->

  <!-- clients -->
  <section class="section">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-title">Our Clients</h2>
          <ul class="list-inline text-center">
            <li class="list-inline-item mx-5 mb-5"><a href="#"><img src="{{asset('vendor/landing/images/clients-logo/client-1.png')}}" alt="clients-logo" class="img-fluid"></a></li>
            <li class="list-inline-item mx-5 mb-5"><a href="#"><img src="{{asset('vendor/landing/images/clients-logo/client-2.png')}}" alt="clients-logo" class="img-fluid"></a></li>
            <li class="list-inline-item mx-5 mb-5"><a href="#"><img src="{{asset('vendor/landing/images/clients-logo/client-3.png')}}" alt="clients-logo" class="img-fluid"></a></li>
            <li class="list-inline-item mx-5 mb-5"><a href="#"><img src="{{asset('vendor/landing/images/clients-logo/client-4.png')}}" alt="clients-logo" class="img-fluid"></a></li>
            <li class="list-inline-item mx-5 mb-5"><a href="#"><img src="{{asset('vendor/landing/images/clients-logo/client-5.png')}}" alt="clients-logo" class="img-fluid"></a></li>
            <li class="list-inline-item mx-5 mb-5"><a href="#"><img src="{{asset('vendor/landing/images/clients-logo/client-6.png')}}" alt="clients-logo" class="img-fluid"></a></li>
            <li class="list-inline-item mx-5 mb-5"><a href="#"><img src="{{asset('vendor/landing/images/clients-logo/client-7.png')}}" alt="clients-logo" class="img-fluid"></a></li>
            <li class="list-inline-item mx-5 mb-5"><a href="#"><img src="{{asset('vendor/landing/images/clients-logo/client-8.png')}}" alt="clients-logo" class="img-fluid"></a></li>
          </ul>
        </div>
      </div>
    </div>
  </section>
  <!-- /clients -->
  </section>
@endsection

@push('script')

@endpush
