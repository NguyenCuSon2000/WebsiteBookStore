<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!-- <link rel="stylesheet" href="{{ asset('css/pay.css') }}"> -->
<!------ Include the above in your HEAD tag ---------->

@extends('layout')

@section('content')
<!--slider sec strat-->
<section id="slider-sec" class="slider-sec parallax" style="background: url({{asset('img'.'/'.'banner1.3.jpg')}});">
</section>
<!--slider sec end-->

<div class="about_content">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-10  text-center text-lg-left wow slideInUp" data-wow-duration="2s">
                <h1 class="heading">Đặt hàng thành công</h1>
                <p class="para_text">Vui lòng check email của bạn</p>
            </div>
        </div>
    </div>
</div>

@endsection