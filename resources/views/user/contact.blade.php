@extends('layout')

@section('content')
<!--Slider Start-->
<div class="map-load">
    <div>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7448.285980805916!2d105.84644422482876!3d21.02696385844097!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xc7670fd918a63c5a!2zSGnhu4d1IHPDoWNoIFRyw6BuZyBUaeG7gW4!5e0!3m2!1svi!2s!4v1618985679766!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>
</div>
<!--Slider End-->

<!-- Contact Us Start -->
<section class="contact-sec" id="contact-sec">

    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-6 contact-description wow slideInLeft" data-wow-delay=".8s">
                <div class="contact-detail wow fadeInLeft">
                    <div class="ex-detail">
                        <span class="fly-text">LIÊN HỆ CHÚNG TÔI</span>
                        <h4 class="large-heading">
                            <span class="heading-1">Liên lạc</span>
                            <!-- <span class="heading-2">In Touch</span> -->
                        </h4>
                    </div>
                    <p class="small-text text-center text-md-left">
                       Nếu bạn có thắc mắc gì, có thể gửi yêu cầu cho chúng tôi, và chúng tôi sẽ liên lạc lại với bạn sớm nhất có thể .
                    </p>
                    <div class="row location-details text-center text-md-left">
                        <div class="col-12 col-md-6 country-1">
                            <h4 class="heading-text text-left">United States</h4>
                            <ul>
                                <li><i class="fas fa-mobile-alt"></i><a href="#">+(34) 609 33 17 54</a></li>
                                <li><i class="fas fa-envelope"></i><a href="#">email@website.com</a></li>
                                <li><i class="fas fa-map-marker"></i><a href="#">201 Oak Street 27 Manchester, USA</a></li>
                            </ul>
                        </div>
                        <div class="col-12 col-md-6 couuntry-1">
                            <h4 class="heading-text text-left">Việt Nam</h4>
                            <ul>
                                <li><i class="fas fa-mobile-alt"></i><a href="#">+(84) 963 104 800</a></li>
                                <li><i class="fas fa-envelope"></i><a href="#">nguyencuson@website.com</a></li>
                                <li><i class="fas fa-map-marker"></i><a href="#">44 Tràng Tiền - Hoàn Kiếm - Hà Nội</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6 contact-box text-center text-md-left wow slideInRight" data-wow-delay=".8s">
                <div class="c-box wow fadeInRight">
                    <h4 class="small-heading">Để lại tin nhắn</h4>

                    <form class="contact-form" id="contact-form-data" action="/contact" method="post"  enctype="multipart/form-data">
                        @csrf
                        <div class="row my-form">
                            <div class="col-md-12 col-sm-12">
                                <div id="result"></div>
                            </div>
                            <div class="col-12 col-md-6">
                                <input type="text" class="form-control" id="candidate_lname" name="name" placeholder="Họ tên" required="required">
                            </div>
                            <div class="col-12 col-md-6">
                                <input type="email" class="form-control" id="user_email" name="email" placeholder="Email" required="required">
                            </div>
                            <div class="col-12 col-md-6">
                                <input type="text" class="form-control" id="user_subject" name="address" placeholder="Địa chỉ" required="required">
                            </div>
                            <div class="col-12 col-md-6">
                                <input type="text" class="form-control" id="user_subject" name="title" placeholder="Tiêu đề" required="required">
                            </div>
                            <div class="col-12">
                                <textarea class="form-control" id="user_message" name="content" placeholder="Nội dung" rows="7" required="required"></textarea>
                            </div>
                            <div class="col-12">
                                <button class="btn green-color-yellow-gradient-btn user-contact contact_btn" type="submit">GỬI</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Contact Us End -->
@endsection