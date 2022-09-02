@extends('layout')

@section('content')

<?php
    // $message = Session::get('message');
    // if($message){
    //     echo '
    //     <script>
    //         alert("Đã mua sản phẩm thành công");
    //     </script>';
    // }

?>

<!--BANNER START-->
<div class="homer-banner">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-6 d-flex justify-content-center align-items-center text-center text-lg-left">
                <div class="banner-description">
                    <span class="small-heading animated fadeInRight delay-1s">BEST AVAILABLE</span>
                    <h1 class="w-sm-100 w-md-100 w-lg-25 animated fadeInLeft delay-1s">BOOKS <span>COLLECTION</span></h1>
                    <a href="{{ route('index') }}" class="btn animated fadeInLeft delay-1s">MUA NGAY</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!--BANNER END-->

<!--START OUR SERVICES-->
<div class="our-services">
    <div class="container">
        <div class="row">

            <div class="col-sm-12 col-md-12 col-lg-3">
                <div class="service">
                    <div class="media">
                        <div class="service-card">
                            <i class="fas fa-truck mr-3"></i>
                            <div class="media-body">
                                <h5 class="mt-0">Miễn phí giao hàng</h5>
                                <span>Đặt hàng hơn 50,000đ</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-3">
                <div class="service">
                    <div class="media">
                        <div class="service-card">
                            <i class="fas fa-undo mr-3"></i>
                            <div class="media-body">
                                <h5 class="mt-0">Đảm bảo hoàn tiền</h5>
                                <span>Hoàn tiền 100%</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-3">
                <div class="service">
                    <div class="media">
                        <div class="service-card">
                            <i class="fas fa-piggy-bank mr-3"></i>
                            <div class="media-body">
                                <h5 class="mt-0">Thanh toán giao hàng</h5>
                                <span>Cam kết an toàn</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-3">
                <div class="service">
                    <div class="media">
                        <div class="service-card">
                            <i class="fas fa-hands-helping mr-3"></i>
                            <div class="media-body">
                                <h5 class="mt-0">Trợ giúp & Hỗ trợ</h5>
                                <span>Số điện thoại: 0963104800</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--END OUR SERVICES-->

<!-- START PORTOLIO SECTION -->
<div class="portfolio-section">
    <div class="container">
        <div class="row">

            <!-- START PORTFOLIO HEADING -->
            <div class="col-12">
                <div class="portfolioHeading text-center">
                    <h1 class="high-lighted-heading">Sản Phẩm Mới</h1>
                    <p>Việc đọc rất quan trọng. Nếu bạn biết cách đọc, cả thế giới sẽ mở ra cho bạn.</p>
                </div>
            </div>
            <!-- END PORTFOLIO HEADING -->

            <!-- START FILTERS -->
            <div class="col-12">
                <div class="clearfix d-flex justify-content-center">
                    <div id="js-filters-blog-posts" class="cbp-l-filters-button cbp-1-filters-alignCenter">
                        <div data-filter="*" class="cbp-filter-item-active cbp-filter-item">Tất cả </div>
                        <div data-filter=".Classic" class="cbp-filter-item">Văn học</div>
                        <div data-filter=".Fantasy" class="cbp-filter-item">Tiểu thuyết</div>
                        <div data-filter=".motion" class="cbp-filter-item">Ẩm thực</div>
                    </div>
                </div>
            </div>
            <!-- END FILTERS -->

            <!-- START PORTFOLIO IMAGES -->
            <div class="col-12">
                <div id="js-grid-blog-posts" class="cbp">
                 @foreach($products as $product)
                    <div  style="{{ $product->Status==0?'display:none':'display:block' }}" class="cbp-item Classic">
                        <a class="portfolio-circle-cart"  href="{{ route('addcart', ['id' => $product->id]) }}">
                            <i class="fa fa-shopping-cart"></i>
                        </a>
                        <div class="cbp-caption-defaultWrap  owl-theme sync-portfolio-carousel owl-carousel">
                              <div class="item"> <a href="{{asset('/storage/img'.'/'.$product->Picture)}}" class="cbp-caption" data-fancybox="gallery1" data-title="Book 1"><img src="{{asset('/storage/img'.'/'.$product->Picture)}}" alt="Book 1"></a></div>
                        </div>
                        <div class="row">
                            <div class="col-12 text-center">
                                <div class="cbp-l-grid-blog-title"><a href="{{ route('product_detail').'/'.$product->id }}" target="_blank" class="portfolio-title">{{$product->ProductName}}</a></div>
                            </div>
                            <div class="col-12 text-center">
                                <div class="cbp-l-grid-blog-desc portfolio-des"> {{ number_format($product->Price) }} VNĐ</div>
                            </div>
                        </div>
                    </div>
                  @endforeach
                  @foreach($products_desc as $product)
                    <div  style="{{ $product->Status==0?'display:none':'display:block' }}" class="cbp-item Fantasy">
                        <a class="portfolio-circle-cart"  href="{{ route('addcart', ['id' => $product->id]) }}">
                            <i class="fa fa-shopping-cart"></i>
                        </a>
                        <div class="cbp-caption-defaultWrap  owl-theme sync-portfolio-carousel owl-carousel">
                               <div class="item"> <a href="{{asset('/storage/img'.'/'.$product->Picture)}}" class="cbp-caption" data-fancybox="gallery1" data-title="Book 1"><img src="{{asset('/storage/img'.'/'.$product->Picture)}}" alt="Book 1"></a></div>
                        </div>
                        <div class="row">
                            <div class="col-12 text-center">
                                <div class="cbp-l-grid-blog-title"><a href="{{ route('product_detail').'/'.$product->id }}" target="_blank" class="portfolio-title">{{$product->ProductName}}</a></div>
                            </div>
                            <div class="col-12 text-center">
                                <div class="cbp-l-grid-blog-desc portfolio-des"> {{ number_format($product->Price) }} VNĐ</div>
                            </div>
                        </div>
                    </div>
                  @endforeach
                  @foreach($product_asc as $product)
                    <div  style="{{ $product->Status==0?'display:none':'display:block' }}" class="cbp-item Fantasy">
                        <a class="portfolio-circle-cart"  href="{{ route('addcart', ['id' => $product->id]) }}">
                            <i class="fa fa-shopping-cart"></i>
                        </a>
                        <div class="cbp-caption-defaultWrap  owl-theme sync-portfolio-carousel owl-carousel">
                               <div class="item"> <a href="{{asset('/storage/img'.'/'.$product->Picture)}}" class="cbp-caption" data-fancybox="gallery1" data-title="Book 1"><img src="{{asset('/storage/img'.'/'.$product->Picture)}}" alt="Book 1"></a></div>
                        </div>
                        <div class="row">
                            <div class="col-12 text-center">
                                <div class="cbp-l-grid-blog-title"><a href="{{ route('product_detail').'/'.$product->id }}" target="_blank" class="portfolio-title">{{$product->ProductName}}</a></div>
                            </div>
                            <div class="col-12 text-center">
                                <div class="cbp-l-grid-blog-desc portfolio-des"> {{ number_format($product->Price) }} VNĐ</div>
                            </div>
                        </div>
                    </div>
                  @endforeach
                  <div class="slide-img bg-img" style="background-image: {{asset('public\front-end\img\core-img\b1.png')}};"></div>
                  @foreach($product_bt as $product)
                    <div  style="{{ $product->Status==0?'display:none':'display:block' }}" class="cbp-item motion">
                        <a class="portfolio-circle-cart"  href="{{ route('addcart', ['id' => $product->id]) }}">
                            <i class="fa fa-shopping-cart"></i>
                        </a>
                        <div class="cbp-caption-defaultWrap  owl-theme sync-portfolio-carousel owl-carousel">
                            <div class="item"> <a href="{{asset('/storage/img'.'/'.$product->Picture)}}" class="cbp-caption" data-fancybox="gallery1" data-title="Book 1"><img src="{{asset('/storage/img'.'/'.$product->Picture)}}" alt="Book 1"></a></div>
                        </div>
                        <div class="row">
                            <div class="col-12 text-center">
                                <div class="cbp-l-grid-blog-title"><a href="{{ route('product_detail').'/'.$product->id }}" target="_blank" class="portfolio-title">{{$product->ProductName}}</a></div>
                            </div>
                            <div class="col-12 text-center">
                                <div class="cbp-l-grid-blog-desc portfolio-des"> {{ number_format($product->Price) }} VNĐ</div>
                            </div>
                        </div>
                    </div>
                  @endforeach
                

                </div>
            </div>
            <!-- END PORTFOLIO IMAGES -->

        </div>
    </div>
</div>
<!-- END PORTOLIO SECTION -->

<!--START BANNER SECTION-->
<div class="banner-section parallax-slide">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-6 text-center text-lg-left">
                <div class="banner-content-wrapper">
                    <span>SẢN PHẨM NỔI BẬT TRONG TUẦN</span>
                    <h1>Books <span>Collections</span></h1>
                    <p>"Việc đọc rất quan trọng. Nếu bạn biết cách đọc, cả thế giới sẽ mở ra cho bạn.” <b>- Barack Obama -</b></p>
                    <button type="button" class="btn green-color-yellow-gradient-btn">MUA NGAY</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!--END BANNER SECTION-->

<!--START LATEST ARRIVALS-->
<div class="lastest_arrivals">
    <div class="container">
        <div class="row">
            <div class="col-12 mb-4">
                <h1>SÁCH KHUYỄN MÃI</h1>
            </div>
            <div class="col-12">
                <div class="lastest_featured_products owl-carousel owl-theme">
                @foreach($products_sale as $product)
                    <div class="lastest_arrival_items item">
                        <a href="{{ route('addcart', ['id' => $product->product->id]) }}" class="lastest-addto-cart"><i class="fa fa-shopping-cart"></i></a>
                        @if($product->Status == 1) 
                        <div class="product-sale">
                                <span><label class="sale-lb">- </label> {{ $product->Percent }}%</span>
                        </div>
                        @endif
                        <div class="card">
                            <span class="product-type">MỚI</span>
                            <div class="image-holder">
                                <a href="{{asset('/storage/img'.'/'.$product->product->Picture)}}" data-fancybox="lastest_product" data-title="Shirt Name">
                                    <img src="{{asset('/storage/img'.'/'.$product->product->Picture)}}" class="card-img-top" alt="Lastest Arrivals 1">
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 text-center">
                                     <a href="{{ route('product_detail').'/'.$product->product->id }}"><h5 class="card-title">{{ $product->product->ProductName }}</h5></a>   
                                    </div>
                                    <div class="col-12 text-center">
                                        <p class="card-text"> {{ number_format($product->product->Price * (100 - $product->Percent)/100)  }} VND</p>
                                        <del class="card-text"> {{ number_format($product->product->Price) }} VND</del>
                                    </div>
                                    <div class="col-12 text-right">
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
<!--END LATEST ARRIVALS-->
@endsection