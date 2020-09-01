@extends('frontend.index')
@section('content')
    <!-- ##### Breadcrumb Area Start ##### -->
    <section class="breadcrumb-area bg-img bg-overlay jarallax" style="background-image: url({{asset('frontend/img/bg-img/8.jpg')}});">
        <div class="container-fluid h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <h2>{{__('lang.Our services')}}</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Breadcrumb Area End ##### -->

    <!-- ##### Services Catagory Area Start ##### -->
    <div class="services-catagory-area d-flex flex-wrap">
        <!-- Single Service Catagory -->
        <div class="single-service-cata bg-img d-flex align-items-center justify-content-center jarallax" style="background-image: url({{asset('frontend/img/bg-img/19.jpg')}});">
            <a href="#">VR / AR</a>
        </div>
        <!-- Single Service Catagory -->
        <div class="single-service-cata bg-img d-flex align-items-center justify-content-center jarallax" style="background-image: url({{asset('frontend/img/bg-img/20.jpg')}});">
            <a href="#">Artificial <br> Inteligence</a>
        </div>
        <!-- Single Service Catagory -->
        <div class="single-service-cata bg-img d-flex align-items-center justify-content-center jarallax" style="background-image: url({{asset('frontend/img/bg-img/21.jpg')}});">
            <a href="#">User <br> Experience</a>
        </div>
    </div>
    <!-- ##### Services Catagory Area End ##### -->

    <!-- ##### Service Area Start ##### -->
    <section class="pixel-service-area">
        <div class="container">
            <div class="row">
                <!-- Single Service Area -->
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="single-service-area text-center mb-100 wow fadeInUp" data-wow-delay="100ms">
                        <img src="{{asset('frontend/img/core-img/cursor.png')}}" alt="">
                        <h5>Light Weight &amp; Fast</h5>
                        <p>Morbi tempus lobortis nunc non commodo. Pellentesque habitant morbi tristique senectus et netus et.</p>
                        <a href="#" class="btn">More Info</a>
                    </div>
                </div>

                <!-- Single Service Area -->
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="single-service-area text-center mb-100 wow fadeInUp" data-wow-delay="200ms">
                        <img src="{{asset('frontend/img/core-img/monitor.png')}}" alt="">
                        <h5>Responsive &amp; Retina Ready</h5>
                        <p>Morbi tempus lobortis nunc non commodo. Pellentesque habitant morbi tristique senectus et netus et.</p>
                        <a href="#" class="btn">More Info</a>
                    </div>
                </div>

                <!-- Single Service Area -->
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="single-service-area text-center mb-100 wow fadeInUp" data-wow-delay="300ms">
                        <img src="{{asset('frontend/img/core-img/presentation.png')}}" alt="">
                        <h5>Documentation</h5>
                        <p>Morbi tempus lobortis nunc non commodo. Pellentesque habitant morbi tristique senectus et netus et.</p>
                        <a href="#" class="btn">More Info</a>
                    </div>
                </div>

                <!-- Single Service Area -->
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="single-service-area text-center mb-100 wow fadeInUp" data-wow-delay="400ms">
                        <img src="{{asset('frontend/img/core-img/settings.png')}}" alt="">
                        <h5>Customizable</h5>
                        <p>Morbi tempus lobortis nunc non commodo. Pellentesque habitant morbi tristique senectus et netus et.</p>
                        <a href="#" class="btn">More Info</a>
                    </div>
                </div>
                <!-- Single Service Area -->
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="single-service-area text-center mb-100 wow fadeInUp" data-wow-delay="100ms">
                        <img src="{{asset('frontend/img/core-img/cursor.png')}}" alt="">
                        <h5>Light Weight &amp; Fast</h5>
                        <p>Morbi tempus lobortis nunc non commodo. Pellentesque habitant morbi tristique senectus et netus et.</p>
                        <a href="#" class="btn">More Info</a>
                    </div>
                </div>

                <!-- Single Service Area -->
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="single-service-area text-center mb-100 wow fadeInUp" data-wow-delay="200ms">
                        <img src="{{asset('frontend/img/core-img/monitor.png')}}" alt="">
                        <h5>Responsive &amp; Retina Ready</h5>
                        <p>Morbi tempus lobortis nunc non commodo. Pellentesque habitant morbi tristique senectus et netus et.</p>
                        <a href="#" class="btn">More Info</a>
                    </div>
                </div>

                <!-- Single Service Area -->
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="single-service-area text-center mb-100 wow fadeInUp" data-wow-delay="300ms">
                        <img src="i{{asset('frontend/mg/core-img/presentation.png')}}" alt="">
                        <h5>Documentation</h5>
                        <p>Morbi tempus lobortis nunc non commodo. Pellentesque habitant morbi tristique senectus et netus et.</p>
                        <a href="#" class="btn">More Info</a>
                    </div>
                </div>

                <!-- Single Service Area -->
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="single-service-area text-center mb-100 wow fadeInUp" data-wow-delay="400ms">
                        <img src="{{asset('frontend/img/core-img/settings.png')}}" alt="">
                        <h5>Customizable</h5>
                        <p>Morbi tempus lobortis nunc non commodo. Pellentesque habitant morbi tristique senectus et netus et.</p>
                        <a href="#" class="btn">More Info</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Service Area End ##### -->
@endsection