@extends('layouts.landing')
@section('content')
    <!-- about us -->
<section class="section-lg about pb-0">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h2 class="section-title">Tentang Aplikasi</h2>
        </div>
        <div class="col-lg-12 mb-100">
          <p>Aplikasi ini Saya buat saat sedang menjalani <em>bootcamp Laravel Vue.js</em> di sebuah platform bernama <a href="https://eduwork.id/">Eduwork</a>. Dalam bootcamp tersebut studi kasus yang diberikan adalah berupa aplikasi pengelolaan data perpustakaan. Daripada dibuat hanya sekedar untuk memenuhi kebutuhan pembelajaran, Saya berinisiatif untuk menghostingnya sebagai portofolio.</p>
          <p>Kelas yang Saya ikuti adalah kelas <em>Laravel Vue.js</em>. Kelas ini diperuntukan untuk siswa yang ingin mempelajari farmwork <a href="">Laravel</a> yang terintegrasi dengan <a href="">Vue.js</a> sebagai <em>handle</em> <em>front end</em>-nya. Selain itu, aplikasi ini juga tertanam beberapa library diluar dari <em>Laravel</em> dan <em>Vue.js</em> seperti di antaranya <em>AdminLTE, SweetAlert, Datatables, </em> dan sebagainya.</p>
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

  <!-- clients -->
  <section class="section">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-title">Teknologi</h2>
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
