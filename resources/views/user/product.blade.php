@extends('layout')

@section('content')
<!--slider sec strat-->
<section id="slider-sec" class="slider-sec parallax" style="background: url({{asset('img'.'/'.'banner1.2.jpg')}});">
</section>
<!--slider sec end-->

<!--Product Line Up Start -->
<div class="product-listing">
    <div class="container">
        <div class="row no-gutters">

            <!-- START STICKY NAV -->
            <div class="col-12 col-lg-4 order-2 order-lg-1 sticky">
                <div id="product-filter-nav" class="product-filter-nav mb-3">
                    <div class="product-category">
                        <h5 class="filter-heading  text-center text-lg-left">Category</h5>
                        <ul>
                            <li><a href="javascript:void(0)">June </a><span>(2)</span></li>
                            <li><a href="javascript:void(0)">July </a><span>(4)</span></li>
                            <li><a href="javascript:void(0)">Augest </a><span>(2)</span></li>
                            <li><a href="javascript:void(0)">March </a><span>(7)</span></li>
                            <li><a href="javascript:void(0)">May </a><span>(9)</span></li>
                        </ul>
                    </div>
                    <div class="product-price mt-1">
                        <h5 class="filter-heading">Shop By</h5>
                        <div id="slider-range"></div>
                        <p class="price-num" style="color: #0b2e13;">Price: <span id="min-p"></span>  <span id="max-p"></span></p>
                    </div>

                    <button class="btn yellow-color-green-gradient-btn mt-1">Filter</button>

                    <div class="product-add mt-4">
                        <div class="row no-gutters">
                            <div class="col-12">
                                <img src="{{ asset('img\advertisement.jpg') }}" alt="images">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END STICKY NAV -->

            <!-- START PRODUCT COL 8 -->
            <div class="col-md-12 col-lg-8 order-1 order-lg-2">
                <div class="row">

                    <!-- START LISTING HEADING -->
                    <div class="col-12 product-listing-heading">
                        <h1 class="heading text-left">Product Listing</h1>
                        <p class="para_text text-left">Lorem ipsum dolor sit amet, consectetur adipiscing elit. tellus lacus faucibus lectus, sed cursused eros ligula non odio.</p>
                    </div>
                    <!-- END LISTING HEADING -->

                    <!-- START PRODUCT LISTING SECTION -->
                    <div class="col-12 product-listing-products">

                        <!-- START DISPLAY PRODUCT -->
                        <div class="product-list row">
                            @foreach($products as $product)
                            <div class="col-12 col-md-6 col-lg-4 manage-color-hover wow slideInUp" data-wow-delay=".2s">
                                <div class="product-item owl-theme product-listing-carousel owl-carousel">
                                    <div class="item p-item-img">
                                            <img src="{{asset('img'.'/'.$product->Picture)}}" alt="images">
                                        <div class="text-center d-flex justify-content-center align-items-center">
                                            <a class="listing-cart-icon" href="shop-cart.html">
                                                <i class="fa fa-shopping-cart"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="item p-item-img">
                                        <img src="{{asset('img'.'/'.$product->Picture1)}}" alt="images">
                                        <div class="text-center d-flex justify-content-center align-items-center">
                                            <a class="listing-cart-icon" href="shop-cart.html">
                                                <i class="fa fa-shopping-cart"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="p-item-detail">
                                    <h4 class="text-center p-item-name"><a href="{{ route('product_detail').'/'.$product->id }}"> {{ $product->ProductName }} </a></h4>
                                    <p class="text-center p-item-price">$100.00</p>
                                </div>
                            </div>
                            @endforeach
                          


                        </div>
                        <!-- END DISPLAY PRODUCT -->


                    </div>
                    <!-- END PRODUCT LISTING SECTION -->
                </div>
            </div>
            <!-- END PRODUCT COL 8 -->

        </div>
    </div>
</div>
<!--Product Line Up End-->
@endsection