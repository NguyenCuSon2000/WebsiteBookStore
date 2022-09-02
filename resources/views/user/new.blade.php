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
                        <h5 class="filter-heading  text-center text-lg-left">Loại sách</h5>
                        <ul>
                            @foreach($product_count as $product)
                            <li>
                                <a href="{{ route('listproduct').'/'.$product->category->id }}">{{ $product->category->CategoryName }} </a>
                                <span>({{ $product->count }})</span>
                            </li>
                            @endforeach
                            
                        </ul>
                    </div>
                    
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
                        <h3 class="heading text-left">Tin tức</h3>
                        <p class="para_text text-left"> "Đọc sách hay cũng giống như trò chuyện với các bộ óc tuyệt vời nhất của những thế kỷ đã trôi qua.” - <b>Rene Descartes</b> - </p>
                    </div>
                    <!-- END LISTING HEADING -->
                    
                    <!-- START PRODUCT LISTING SECTION -->
                    <div class="col-12 product-listing-products">
                        @foreach($news as $new)
                            <!-- START NEWS PRODUCT -->
                            <div class="product-list row">
                                <div class="col-12 col-md-6 col-lg-4 manage-color-hover wow slideInUp" data-wow-delay=".2s">
                                    <div class="product-item owl-theme product-listing-carousel owl-carousel">
                                        <div class="item p-item-img">
                                            <img src="{{asset('/storage/img'.'/'.$new->picture)}}" alt="images">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-8 ">
                                    <div class="p-item-detail mt-4">
                                        <h4 class="text-left p-item-name"><a href="{{route('new_detail', $new->id)}}"> {{$new->title}} </a></h4>
                                        <ul class="info-more">
                                            <li class="info-item"><i class="far fa-calendar-alt"></i><time pubdate="" datetime="2016-12-15">{{ \Carbon\Carbon::parse($new->date)->format('d/m/Y') }}</time></li>
                                            <li class="info-item"><i class="far fa-file-alt"></i></i><a href="#"> Tin tức	</a> </li>
                                        </ul>
                                        <p class="text-left">{{ $new->description }}</p>
                                    </div>
                                    <a class="readmore btn-rb clear-fix" href="{{route('new_detail', $new->id)}}" role="button">Xem tiếp <span class="fa fa-angle-double-right"></span></a>
                                </div>
                            </div>
                            <!-- END NEWS PRODUCT -->
                        @endforeach
                    </div>
                    <!-- END PRODUCT LISTING SECTION -->
                </div>
            </div>
            <!-- END PRODUCT COL 8 -->
            
        </div>
       
    </div>
</div>
<!--Product Line Up End-->
<div style="margin-left: 50%; margin-bottom: 50px;">
    {{$news->links()}}
</div>
@endsection

