@extends('layouts.landing')
@section('content')
<!-- service -->
<section class="section-lg service-bg-image position-relative" style="background-image: url({{asset('vendor/landing/images/backgrounds/service-page.png')}});">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="section-title">Easy to used</h2>
                <p class="mb-100">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.<br>Excepteur sint occaecat cupidatat non proident</p>
            </div>
            <!-- service item -->
            <div class="col-sm-6 mb-4">
                <div class="rounded bg-white p-4 shadow-primary">
                    <i class="ti-layers-alt round-icon blue mb-4"></i>
                    <h4>Awesome design</h4>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.<br><br>There live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
                </div>
            </div>
            <!-- service item -->
            <div class="col-sm-6 mb-4 translate-y-150">
                <div class="rounded bg-white p-4 shadow-primary">
                    <i class="ti-layers-alt round-icon green mb-4"></i>
                    <h4>Easy to customize</h4>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.<br><br>There live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
                </div>
            </div>
            <!-- service item -->
            <div class="col-sm-6 mb-4">
                <div class="rounded bg-white p-4 shadow-primary">
                    <i class="ti-layers-alt round-icon orange mb-4"></i>
                    <h4>24 Hours Open</h4>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.<br><br>There live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
                </div>
            </div>
            <!-- service item -->
            <div class="col-sm-6 mb-4 translate-y-150">
                <div class="rounded bg-white p-4 shadow-primary">
                    <i class="ti-layers-alt round-icon blue mb-4"></i>
                    <h4>Maximum Support</h4>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.<br><br>There live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
                </div>
            </div>
            <!-- service item -->
            <div class="col-sm-6 mb-4">
                <div class="rounded bg-white p-4 shadow-primary">
                    <i class="ti-layers-alt round-icon green mb-4"></i>
                    <h4>Lower Budget</h4>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.<br><br>There live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
                </div>
            </div>
            <!-- service item -->
            <div class="col-sm-6 mb-4 translate-y-150">
                <div class="rounded bg-white p-4 shadow-primary">
                    <i class="ti-layers-alt round-icon orange mb-4"></i>
                    <h4>Great service</h4>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.<br><br>There live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- background shapes -->
    <img class="service-bg-1 up-down-animation" src="{{asset('vendor/landing/images/background-shape/feature-bg-2.png')}}" alt="">
    <img class="service-bg-2 left-right-animation" src="{{asset('vendor/landing/images/background-shape/seo-half-cycle.png')}}" alt="">
    <img class="service-bg-3 up-down-animation" src="{{asset('vendor/landing/images/background-shape/team-bg-triangle.png')}}" alt="">
    <img class="service-bg-4 left-right-animation" src="{{asset('vendor/landing/images/background-shape/green-dot.png')}}" alt="">
    <img class="service-bg-5 up-down-animation" src="{{asset('vendor/landing/images/background-shape/team-bg-triangle.png')}}" alt="">
</section>
<!-- /service -->
@endsection
