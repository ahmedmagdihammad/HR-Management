@extends('frontend.index')
@section('content')
     <!-- ##### Breadcrumb Area Start ##### -->
     <section class="breadcrumb-area bg-img bg-overlay jarallax" style="background-image: url(img/bg-img/8.jpg);">
        <div class="container-fluid h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <h2>{{__('lang.Contact us')}}</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Breadcrumb Area End ##### -->

    <!-- ##### Google Maps ##### -->
    <div class="map-area">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d22236.40558254599!2d-118.25292394686001!3d34.057682914027104!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c2c75ddc27da13%3A0xe22fdf6f254608f4!2z4Kay4Ka4IOCmj-CmnuCnjeCmnOCnh-CmsuCnh-CmuCwg4KaV4KeN4Kav4Ka-4Kay4Ka_4Kar4KeL4Kaw4KeN4Kao4Ka_4Kav4Ka84Ka-LCDgpq7gpr7gprDgp43gppXgpr_gpqgg4Kav4KeB4KaV4KeN4Kak4Kaw4Ka-4Ka34KeN4Kaf4KeN4Kaw!5e0!3m2!1sbn!2sbd!4v1532328708137" allowfullscreen></iframe>
    </div>

    <!-- ##### Contact Area Start ##### -->
    <section class="contact-area section-padding-100-0">
        <div class="container">
            <div class="row">

                <!-- Single Contact Area -->
                <div class="col-12 col-lg-4">
                    <!-- Contact Content -->
                    <div class="contact-content mb-100">
                        <!-- Section Heading -->
                        <div class="section-heading">
                            <h2>{{__('lang.Where?')}}</h2>
                            <h6>{{__('lang.Our Address')}}</h6>
                        </div>

                        <!-- Single Contact Content -->
                        <div class="single-contact-content d-flex">
                            <div class="icon">
                                <i class="fa fa-star" aria-hidden="true"></i>
                            </div>
                            <div class="text">
                                <h6>{{__('lang.Address')}}</h6>
                                <p>1530 Doverfield Ave <br> Hacienda Heights, California(CA), 91745 </p>
                            </div>
                        </div>

                        <!-- Single Contact Content -->
                        <div class="single-contact-content d-flex">
                            <div class="icon">
                                <i class="fa fa-envelope-o"></i>
                            </div>
                            <div class="text">
                                <h6>{{__('lang.Email')}}</h6>
                                <p>office@pixelagency.com <br> johndoe@pixelagency,com</p>
                            </div>
                        </div>

                        <!-- Single Contact Content -->
                        <div class="single-contact-content d-flex">
                            <div class="icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="text">
                                <h6>{{__('lang.Phone')}}</h6>
                                <p>+01 251 332 331 <br>+01 251 132 331</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Single Contact Area -->
                <div class="col-12 col-lg-8">
                    <!-- Section Heading -->
                    <div class="section-heading">
                        <h2>{{__('lang.Get In Touch')}}</h2>
                        <h6>{{__('lang.Drop us a few lines')}}</h6>
                    </div>

                    <!-- Contact Form -->
                    <div class="contact-form-area mb-100">
                        <form action="#" method="post">
                            <input type="text" name="name" class="form-control" placeholder="{{__('lang.Name')}}">
                            <input type="email" name="email" class="form-control" placeholder="{{__('lang.E-mail')}}">
                            <input type="text" name="subject" class="form-control" placeholder="{{__('lang.Subject')}}">
                            <textarea name="message" class="form-control" placeholder="{{__('lang.Message')}}"></textarea>
                            <button type="submit" class="btn pixel-btn">{{__('lang.Send Message')}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- ##### Contact Area End ##### -->
@endsection