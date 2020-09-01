<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <link href="{{asset('frontend/css/flag.min.css')}}" rel="stylesheet">

    <!-- Title -->
    <title>Shabab milion</title>

    <!-- Favicon -->
    <link rel="icon" href="{{asset('frontend/img/core-img/favicon.ico')}}">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="{{asset('frontend/style.css')}}">

</head>

<body>
    <!-- Preloader -->
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="lds-ellipsis">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>

    <!-- ##### Header Area Start ##### -->
    <header class="header-area">
        <!-- Navbar Area -->
        <div class="pixel-main-menu" id="sticker">
            <div class="classy-nav-container breakpoint-off" style="width: 95%;">
                <div class="container-fluid">
                    <!-- Menu -->
                    <nav class="classy-navbar justify-content-between" id="pixelNav">

                        <!-- Nav brand -->
                        <a href="#" class="nav-brand"><img src="{{asset('frontend/img/logo/logo.png')}}" style="width: auto; height: 80px;" alt=""></a>

                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <!-- Menu -->
                        <div class="classy-menu">

                            <!-- Close Button -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>

                            <!-- Nav Start -->
                            <div class="classynav">
                                <ul>
                                    <li><a href="{{url($lang,'home')}}">{{__('lang.Home')}}</a></li>
                                    <li><a href="{{url($lang,'about')}}">{{__('lang.About us')}}</a></li>
                                    <li><a href="{{url($lang,'services')}}">{{__('lang.Our services')}}</a></li>
                                    <!-- <li><a href="portfolio.html">Pages</a>
                                        <ul class="dropdown">
                                            <li><a href="index.html">Home</a></li>
                                            <li><a href="about.html">About Us</a></li>
                                            <li><a href="services.html">Services</a>
                                                <ul class="dropdown">
                                                    <li><a href="index.html">Home</a></li>
                                                    <li><a href="about.html">About Us</a></li>
                                                    <li><a href="services.html">Services</a></li>
                                                    <li><a href="portfolio.html">Portfolio</a>
                                                        <ul class="dropdown">
                                                            <li><a href="index.html">Home</a></li>
                                                            <li><a href="about.html">About Us</a></li>
                                                            <li><a href="services.html">Services</a></li>
                                                            <li><a href="portfolio.html">Portfolio</a></li>
                                                            <li><a href="contact.html">Contact</a></li>
                                                            <li><a href="elements.html">Elements</a></li>
                                                        </ul>
                                                    </li>
                                                    <li><a href="contact.html">Contact</a></li>
                                                    <li><a href="elements.html">Elements</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="portfolio.html">Portfolio</a></li>
                                            <li><a href="contact.html">Contact</a></li>
                                            <li><a href="elements.html">Elements</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Mega</a>
                                        <div class="megamenu">
                                            <ul class="single-mega cn-col-4">
                                                <li><a href="index.html">Home</a></li>
                                                <li><a href="about.html">About Us</a></li>
                                                <li><a href="services.html">Services</a></li>
                                                <li><a href="portfolio.html">Portfolio</a></li>
                                                <li><a href="contact.html">Contact</a></li>
                                                <li><a href="elements.html">Elements</a></li>
                                            </ul>
                                            <ul class="single-mega cn-col-4">
                                                <li><a href="index.html">Home</a></li>
                                                <li><a href="about.html">About Us</a></li>
                                                <li><a href="services.html">Services</a></li>
                                                <li><a href="portfolio.html">Portfolio</a></li>
                                                <li><a href="contact.html">Contact</a></li>
                                                <li><a href="elements.html">Elements</a></li>
                                            </ul>
                                            <ul class="single-mega cn-col-4">
                                                <li><a href="index.html">Home</a></li>
                                                <li><a href="about.html">About Us</a></li>
                                                <li><a href="services.html">Services</a></li>
                                                <li><a href="portfolio.html">Portfolio</a></li>
                                                <li><a href="contact.html">Contact</a></li>
                                                <li><a href="elements.html">Elements</a></li>
                                            </ul>
                                            <ul class="single-mega cn-col-4">
                                                <li><a href="index.html">Home</a></li>
                                                <li><a href="about.html">About Us</a></li>
                                                <li><a href="services.html">Services</a></li>
                                                <li><a href="portfolio.html">Portfolio</a></li>
                                                <li><a href="contact.html">Contact</a></li>
                                                <li><a href="elements.html">Elements</a></li>
                                            </ul>
                                        </div>
                                    </li> -->
                                    <li><a href="{{url($lang,'contact')}}">{{__('lang.Contact us')}}</a></li>
                                </ul>

                                <!-- Top Social Info -->
                                <div class="top-social-info ml-5">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                    @if(App::isLocale('en')) 
                                        <a href="/ar/{{Route::currentRouteName()}}"><i class="eg flag"></i></a>
                                    @endif
                                    @if(App::isLocale('ar')) 
                                        <a href="/en/{{Route::currentRouteName()}}"><i class="ai flag"></i></a>
                                    @endif 
                                </div>
                            </div>
                            <!-- Nav End -->
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ##### Header Area End ##### -->

    @yield('content')
    
    <!-- ##### Contact Area End #####-->

    <!-- ##### Footer Area Start ##### -->
    <footer class="footer-area section-padding-100-0">
        <div class="container-fluid">
            <div class="row justify-content-between">

                <!-- Single Footer Widget -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="single-footer-widget mb-100">
                        <!-- Footer Logo -->
                        <a href="#" class="footer-logo"><img src="{{asset('frontend/img/logo/logo.png')}}" style="width: 100px; height: 100px;" alt=""></a>
                    </div>
                </div>

                <!-- Single Footer Widget -->
                <div class="col-12 col-md-9 col-lg-8 col-xl-7">
                    <div class="row">
                        <!-- Single Footer Widget -->
                        <div class="col-sm-4">
                            <div class="single-footer-widget mb-100">
                                <h5 class="widget-title">{{__('lang.Address')}}</h5>
                                <p>1530 Doverfield Ave <br> Hacienda Heights, California(CA), 91745</p>
                            </div>
                        </div>

                        <!-- Single Footer Widget -->
                        <div class="col-sm-4">
                            <div class="single-footer-widget mb-100">
                                <h5 class="widget-title">{{__('lang.Social')}}</h5>
                                <div class="footer-social-info">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Copywrite Area -->
        <div class="copywrite-area">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-12 col-md-6">
                        <div class="copywrite-content">
                            <!-- Copywrite Text -->
                            <p class="copywrite-text"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                              Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved |  Created <i aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank"> Fastkood</a></p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <nav class="footer-nav">
                            <ul>
                                <li><a href="{{url($lang,'home')}}">{{__('lang.Home')}}</a></li>
                                <li><a href="{{url($lang,'about')}}">{{__('lang.About us')}}</a></li>
                                <li><a href="{{url($lang,'services')}}">{{__('lang.Our services')}}</a></li>
                                <li><a href="{{url($lang,'contact')}}">{{__('lang.Contact us')}}</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ##### Footer Area Start ##### -->

    <!-- ##### All Javascript Script ##### -->
    <!-- jQuery-2.2.4 js -->
    <script src="{{asset('frontend/js/jquery/jquery-2.2.4.min.js')}}"></script>
    <!-- Popper js -->
    <script src="{{asset('frontend/js/bootstrap/popper.min.js')}}"></script>
    <!-- Bootstrap js -->
    <script src="{{asset('frontend/js/bootstrap/bootstrap.min.js')}}"></script>
    <!-- All Plugins js -->
    <script src="{{asset('frontend/js/plugins/plugins.js')}}"></script>
    <!-- Active js -->
    <script src="{{asset('frontend/js/active.js')}}"></script>
</body>

</html>