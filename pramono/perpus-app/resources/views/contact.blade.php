@extends('layouts.landing')
@section('content')
    <!-- contact -->
<section class="section-lg contact">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-title">Contact</h2>
            </div>
        </div>
        <div class="row contact-bg p-5 rounded mb-5">
            <div class="col-lg-7 mb-4 mb-lg-0">
                <form action="#">
                    <input type="text" class="form-control mb-3" id="name" name="name" placeholder="Your Name">
                    <input type="email" class="form-control mb-3" id="mail" name="mail" placeholder="Your Email">
                    <input type="text" class="form-control mb-3" id="subject" name="subject" placeholder="Subject">
                    <textarea name="message" id="message" class="form-control mb-3" placeholder="Your Message"></textarea>
                    <button type="submit" value="send" class="btn btn-secondary">SEND MESSAGE</button>
                </form>
            </div>
            <div class="col-lg-5">
                <p class="mb-5">If you'll like to know more about our experience designing and delivering cloud solutions, or get advice on your own technology challenges get in touch. With dedicated engineers on-hand 24/7,      we’re set up to become an extension of your team.</p>
                <a href="tel:+442081446356" class="text-color h5 d-block">+44 20 8144 6356</a>
                <a href="mailto:info@altostack.io" class="mb-5 text-color h5 d-block">info@altostack.io</a>
                <p>71 Shelton Street<br>London WC2H 9JQ England</p>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-4 col-sm-6 mb-4 mb-lg-0">
                <div class="card p-4 border-blue">
                    <h5><i class="ti-layers-alt round-icon blue mr-2"></i> Sales</h5>
                    <p class="mb-0">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.</p>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 mb-4 mb-lg-0">
                <div class="card p-4 border-blue">
                    <h5><i class="ti-desktop round-icon green mr-2"></i> Help & Support</h5>
                    <p class="mb-0">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.</p>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 mb-4 mb-lg-0">
                <div class="card p-4 border-blue">
                    <h5><i class="ti-panel round-icon orange mr-2"></i> Legal Departments</h5>
                    <p class="mb-0">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- background shapes -->
    <img class="contact-bg-1 up-down-animation" src="{{asset('vendor/landing/images/background-shape/feature-bg-2.png')}}" alt="background-shape">
    <img class="contact-bg-2 left-right-animation" src="{{asset('vendor/landing/images/background-shape/green-half-cycle.png')}}" alt="background-shape">
    <img class="contact-bg-3 up-down-animation" src="{{asset('vendor/landing/images/background-shape/green-dot.png')}}" alt="background-shape">
    <img class="contact-bg-4 left-right-animation" src="{{asset('vendor/landing/images/background-shape/service-half-cycle.png')}}" alt="background-shape">
    <img class="contact-bg-5 up-down-animation" src="{{asset('vendor/landing/images/background-shape/feature-bg-2.png')}}" alt="background-shape">
</section>
<!-- /contact -->
@endsection
