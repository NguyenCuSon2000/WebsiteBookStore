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
            <div class="col-12 col-lg-12 order-2 order-lg-1 sticky">
                <div id="product-filter-nav" class="new-filter-nav mb-3">
                    <div class="product-category">
                        <h1 class="filter-heading text-center text-lg-left">{{ $news->title }}</h1>
                    </div>
                    <div class="product-add mt-4">
                        <div class="row no-gutters">
                            <div class="col-12">
                                <img class="new_img" src="{{ asset('img'.'/'.$news->picture) }}" alt="thumnails">
                                <p>{!! $news->content !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END STICKY NAV -->
        </div>
    </div>
</div>
<!--Product Line Up End-->
<div style="margin-left: 50%; margin-bottom: 50px;">
    
</div>

@endsection

