@extends('layout')

@section('content')

<!--BANNER START-->
<div class="homer-banner">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-6 d-flex justify-content-center align-items-center text-center text-lg-left">
                <div class="banner-description">
                    <span class="small-heading animated fadeInRight delay-1s">BEST AVAILABLE</span>
                    <h1 class="w-sm-100 w-md-100 w-lg-25 animated fadeInLeft delay-1s">BOOKS <span>COLLECTION</span></h1>
                    <a href="book-shop/product-listing.html" class="btn animated fadeInLeft delay-1s">MUA NGAY</a>
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
                                <h5 class="mt-0">Free Shipping Item</h5>
                                <span>Order over $500</span>
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
                                <h5 class="mt-0">Money Back Guarantee</h5>
                                <span>100% money back</span>
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
                                <h5 class="mt-0">Cash On Delivery</h5>
                                <span>Lorem ipsum dolor amet</span>
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
                                <h5 class="mt-0">Help & Support</h5>
                                <span>Call us: +0123,4567.89</span>
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
                    <h1 class="high-lighted-heading">Sản Phẩm Nổi Bật</h1>
                    <p>Việc đọc rất quan trọng. Nếu bạn biết cách đọc, cả thế giới sẽ mở ra cho bạn.</p>
                </div>
            </div>
            <!-- END PORTFOLIO HEADING -->

            <!-- START FILTERS -->
            <div class="col-12">
                <div class="clearfix d-flex justify-content-center">
                    <div id="js-filters-blog-posts" class="cbp-l-filters-button cbp-1-filters-alignCenter">
                        <div data-filter="*" class="cbp-filter-item-active cbp-filter-item">Tất cả </div>
                        <div data-filter=".Classic" class="cbp-filter-item">Kinh tế</div>
                        <div data-filter=".Fantasy" class="cbp-filter-item">Kỹ năng mềm</div>
                        <div data-filter=".motion" class="cbp-filter-item">Ngoại ngữ</div>
                    </div>
                </div>
            </div>
            <!-- END FILTERS -->

            <!-- START PORTFOLIO IMAGES -->
            <div class="col-12">
                <div id="js-grid-blog-posts" class="cbp">
                 @foreach($products as $product)

                    <div class="cbp-item Classic Fantasy">
                        <a class="portfolio-circle-cart"  href="{{ route('addcart', ['id' => $product->id]) }}">
                            <i class="fa fa-shopping-cart"></i>
                        </a>
                        <div class="cbp-caption-defaultWrap  owl-theme sync-portfolio-carousel owl-carousel">
                            <div class="item"> <a href="{{asset('img'.'/'.$product->Picture)}}" class="cbp-caption" data-fancybox="gallery1" data-title="Book 1"><img src="{{asset('img'.'/'.$product->Picture)}}" alt="Book 1"></a></div>
                            <div class="item"> <a href="{{asset('img'.'/'.$product->Picture1)}}" class="cbp-caption" data-fancybox="gallery1" data-title="Book 1"><img src="{{asset('img'.'/'.$product->Picture1)}}" alt="Book 1"></a></div>
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
                      <!-- <div class="cbp-item Classic Fantasy">
                        <a class="portfolio-circle-cart" href="book-shop/shop-cart.html">
                            <i class="fa fa-shopping-cart"></i>
                        </a>
                        <div class="cbp-caption-defaultWrap  owl-theme sync-portfolio-carousel owl-carousel">
                            <div class="item"> <a href="book-shop/img/book-2.jpg" class="cbp-caption" data-fancybox="gallery2" data-title="Book2"> <img src="book-shop/img/book-2.jpg" alt=""></a></div>
                            <div class="item"> <a href="book-shop/img/book-2-1.jpg" class="cbp-caption" data-fancybox="gallery2" data-title="Book2"><img src="book-shop/img/book-2-1.jpg" alt=""></a></div>
                        </div>

                        <div class="row">
                            <div class="col-12 text-center">
                               <div class="cbp-l-grid-blog-title"><a href="#" target="_blank" class="portfolio-title">The Last Stand</a></div>
                            </div>
                            <div class="col-12 text-center">
                                <div class="cbp-l-grid-blog-desc portfolio-des">$550.00</div>
                            </div>
                        </div>
                    </div>

                    <div class="cbp-item Classic">
                        <a class="portfolio-circle-cart" href="book-shop/shop-cart.html">
                            <i class="fa fa-shopping-cart"></i>
                        </a>
                        <div class="cbp-caption-defaultWrap  owl-theme sync-portfolio-carousel owl-carousel">
                            <div class="item"> <a href="book-shop/img/book-3.jpg" class="cbp-caption" data-fancybox="gallery3" data-title="Shirt Name"> <img src="book-shop/img/book-3.jpg" alt=""></a></div>
                            <div class="item"> <a href="book-shop/img/book-3-1.jpg" class="cbp-caption" data-fancybox="gallery3" data-title="Shirt Name"><img src="book-shop/img/book-3-1.jpg" alt=""></a></div>
                        </div>

                        <div class="row">
                            <div class="col-12 text-center">
                                <div class="cbp-l-grid-blog-title"><a href="#" target="_blank" class="portfolio-title">Love Does</a></div>
                            </div>
                            <div class="col-12 text-center">
                                <div class="cbp-l-grid-blog-desc portfolio-des">$450.00</div>
                            </div>
                        </div>
                    </div>

                    <div class="cbp-item Fantasy motion">

                        <a class="portfolio-circle-cart" href="book-shop/shop-cart.html">
                            <i class="fa fa-shopping-cart"></i>
                        </a>

                        <div class="cbp-caption-defaultWrap  owl-theme sync-portfolio-carousel owl-carousel">
                            <div class="item"> <a href="book-shop/img/book-4.jpg" class="cbp-caption" data-fancybox="gallery4" data-title="Shirt Name"> <img src="book-shop/img/book-4.jpg" alt=""></a></div>
                            <div class="item"> <a href="book-shop/img/book-4-1.jpg" class="cbp-caption" data-fancybox="gallery4" data-title="Shirt Name"><img src="book-shop/img/book-4-1.jpg" alt=""></a></div>
                        </div>

                        <div class="row">
                            <div class="col-12 text-center">
                                <div class="cbp-l-grid-blog-title"><a href="#" target="_blank" class="portfolio-title">The Imortal Rules</a></div>
                            </div>
                            <div class="col-12 text-center">
                                <div class="cbp-l-grid-blog-desc portfolio-des">$750.00</div>
                            </div>
                        </div>
                    </div>

                    <div class="cbp-item Fantasy motion">
                        <a class="portfolio-circle-cart" href="book-shop/shop-cart.html">
                            <i class="fa fa-shopping-cart"></i>
                        </a>

                        <div class="cbp-caption-defaultWrap  owl-theme sync-portfolio-carousel owl-carousel">
                            <div class="item"> <a href="book-shop/img/book-5.jpg" class="cbp-caption" data-fancybox="gallery5" data-title="Shirt Name"> <img src="book-shop/img/book-5.jpg" alt=""></a></div>
                            <div class="item"> <a href="book-shop/img/book-5-1.jpg" class="cbp-caption" data-fancybox="gallery5" data-title="Shirt Name"><img src="book-shop/img/book-5-1.jpg" alt=""></a></div>
                        </div>

                        <div class="row">
                            <div class="col-12 text-center">
                                <div class="cbp-l-grid-blog-title"><a href="#" target="_blank" class="portfolio-title">As I Lay Dying</a></div>
                            </div>
                            <div class="col-12 text-center">
                                <div class="cbp-l-grid-blog-desc portfolio-des">$450.00</div>
                            </div>
                        </div>

                    </div>

                    <div class="cbp-item Fantasy motion">
                        <a class="portfolio-circle-cart" href="book-shop/shop-cart.html">
                            <i class="fa fa-shopping-cart"></i>
                        </a>

                        <div class="cbp-caption-defaultWrap  owl-theme sync-portfolio-carousel owl-carousel">
                            <div class="item"> <a href="book-shop/img/book-6.jpg" class="cbp-caption" data-fancybox="gallery6" data-title="Shirt Name"> <img src="book-shop/img/book-6.jpg" alt=""></a></div>
                            <div class="item"> <a href="book-shop/img/book-6-1.jpg" class="cbp-caption" data-fancybox="gallery6" data-title="Shirt Name"><img src="book-shop/img/book-6-1.jpg" alt=""></a></div>
                        </div>

                        <div class="row">
                            <div class="col-12 text-center">
                                <div class="cbp-l-grid-blog-title"><a href="#" target="_blank" class="portfolio-title">No One Belongs</a></div>
                            </div>
                            <div class="col-12 text-center">
                                <div class="cbp-l-grid-blog-desc portfolio-des">$999.00</div>
                            </div>
                        </div>

                    </div>   -->

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
                    <span>TRENDING PRODUCT OF THE WEEK</span>
                    <h1>Books <span>Collections</span></h1>
                    <p>Aenean imperdiet. Etiam ultricies nisi vel augue men tuhi spectrum alle me</p>
                    <button type="button" class="btn green-color-yellow-gradient-btn">BUY NOW</button>
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
                        <a href="book-shop/product-detail.html" class="lastest-addto-cart"><i class="fa fa-shopping-cart"></i></a>
                        <div class="product-sale">
                                <span><label class="sale-lb">- </label> {{ $product->Percent }}%</span>
                            </div>
                        <div class="card">
                            <span class="product-type">MỚI</span>
                            <div class="image-holder">
                                <a href="{{asset('img'.'/'.$product->product->Picture)}}" data-fancybox="lastest_product" data-title="Shirt Name">
                                    <img src="{{asset('img'.'/'.$product->product->Picture)}}" class="card-img-top" alt="Lastest Arrivals 1">
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 text-center">
                                        <h5 class="card-title">{{ $product->product->ProductName }}</h5>
                                    </div>
                                    <div class="col-12 text-center">
                                        <p class="card-text"> {{ number_format($product->Promotion_price) }} VND</p>
                                        <del class="card-text"> {{ number_format($product->product->Price) }} VND</del>
                                    </div>
                                    <div class="col-12 text-right">
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                    <!-- <div class="lastest_arrival_items item">
                        <a href="book-shop/product-detail.html" class="lastest-addto-cart"><i class="fa fa-shopping-cart"></i></a>
                        <div class="card">  <span class="product-type">NEW</span>
                            <div class="image-holder">
                                <a href="book-shop/img/l7.jpg" data-fancybox="lastest_product" data-title="Lastest Arrivals 1">
                                    <img src="book-shop/img/l7.jpg" class="card-img-top" alt="Lastest Arrivals 1">
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 text-center">
                                        <h5 class="card-title">The Joke</h5>
                                    </div>
                                    <div class="col-12 text-center">
                                        <p class="card-text text-center"> $850.00</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="lastest_arrival_items item">
                        <a href="book-shop/product-detail.html" class="lastest-addto-cart"><i class="fa fa-shopping-cart"></i></a>
                        <div class="card">
                            <span class="product-type">NEW</span>
                            <div class="image-holder">
                                <a href="book-shop/img/l8.jpg" data-fancybox="lastest_product" data-title="Lastest Arrivals 1">
                                    <img src="book-shop/img/l8.jpg" class="card-img-top" alt="Lastest Arrivals 1">
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 text-center">
                                        <h5 class="card-title">Never Let Me Go </h5>
                                    </div>
                                    <div class="col-12 text-center">
                                        <p class="card-text text-center"> $650.00</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="lastest_arrival_items item">
                        <a href="book-shop/product-detail.html" class="lastest-addto-cart"><i class="fa fa-shopping-cart"></i></a>
                        <div class="card">
                            <span class="product-type">NEW</span>
                            <div class="image-holder">
                                <a href="book-shop/img/l9.jpg" data-fancybox="lastest_product" data-title="Lastest Arrivals 1">
                                    <img src="book-shop/img/l9.jpg" class="card-img-top" alt="Lastest Arrivals 1">
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 text-center">
                                        <h5 class="card-title"> The Last World</h5>
                                    </div>
                                    <div class="col-12 text-center">
                                        <p class="card-text text-center"> $680.00</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="lastest_arrival_items item">
                        <a href="book-shop/product-detail.html" class="lastest-addto-cart"><i class="fa fa-shopping-cart"></i></a>
                        <div class="card">
                            <span class="product-type">NEW</span>
                            <div class="image-holder">
                                <a href="book-shop/img/l10.jpg" data-fancybox="lastest_product" data-title="Lastest Arrivals 1">
                                    <img src="book-shop/img/l10.jpg" class="card-img-top" alt="Lastest Arrivals 1">
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 text-center">
                                        <h5 class="card-title">Brave New World</h5>
                                    </div>
                                    <div class="col-12 text-center">
                                        <p class="card-text text-center"> $250.00</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="lastest_arrival_items item">
                        <a href="book-shop/product-detail.html" class="lastest-addto-cart"><i class="fa fa-shopping-cart"></i></a>
                        <div class="card">
                            <span class="product-type">NEW</span>
                            <div class="image-holder">
                                <a href="book-shop/img/l11.jpg" data-fancybox="lastest_product" data-title="Lastest Arrivals 1">
                                    <img src="book-shop/img/l11.jpg" class="card-img-top" alt="Lastest Arrivals 1">
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 text-center">
                                        <h5 class="card-title">Life Without Money</h5>
                                    </div>
                                    <div class="col-12 text-center">
                                        <p class="card-text text-center"> $850.00</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="lastest_arrival_items item">
                        <a href="book-shop/product-detail.html" class="lastest-addto-cart"><i class="fa fa-shopping-cart"></i></a>
                        <div class="card">
                            <span class="product-type">NEW</span>
                            <div class="image-holder">
                                <a href="book-shop/img/l12.jpg" data-fancybox="lastest_product" data-title="Lastest Arrivals 1">
                                    <img src="book-shop/img/l12.jpg" class="card-img-top" alt="Lastest Arrivals 1">
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 text-center">
                                        <h5 class="card-title">Life Is Elsewhere</h5>
                                    </div>
                                    <div class="col-12 text-center">
                                        <p class="card-text text-center"> $950.00</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="lastest_arrival_items item">
                        <a href="book-shop/product-detail.html" class="lastest-addto-cart"><i class="fa fa-shopping-cart"></i></a>
                        <div class="card">
                            <span class="product-type">NEW</span>
                            <div class="image-holder">
                                <a href="book-shop/img/l7.jpg" data-fancybox="lastest_product" data-title="Lastest Arrivals 1">
                                    <img src="book-shop/img/l13.jpg" class="card-img-top" alt="Lastest Arrivals 1">
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 text-center">
                                        <h5 class="card-title">The Road</h5>
                                    </div>
                                    <div class="col-12 text-center">
                                        <p class="card-text text-center"> $550.00</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->

                </div>
            </div>
        </div>
    </div>
</div>
<!--END LATEST ARRIVALS-->
@endsection