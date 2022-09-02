@extends('layout')

@section('content')
<!--slider sec strat-->
<section id="slider-sec" class="slider-sec parallax" style="background: url({{asset('img'.'/'.'banner1.1.jpg')}});">
</section>
<!--slider sec end-->

<!-- START HEADING SECTION -->
<div class="about_content">
    <div class="container">
        <div class="row">
            <div class="col-12">
                
                <div class="product-body">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb text-center text-lg-left">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Trang chủ</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Sách</a></li>
                            <li class="breadcrumb-item" aria-current="page"><a href="javascript:void(0)">{{ $product->category->CategoryName }}</a></li>
                            <li class="breadcrumb-item"><a class="active" href="javascript:void(0)">{{ $product->ProductName }}</a></li>
                        </ol>
                    </nav>
                    <div class="pro-detail-sec row">
                        <div class="col-12">
                            <h4 class="pro-heading text-center text-lg-left">{{ $product->ProductName }}</h4>
                            <!-- <p class="pro-text text-center text-lg-left">{{ $product->Description }}</p> -->
                        </div>
                    </div>
                    <div class="row product-list product-detail">
                        
                        <div class="col-12 col-lg-6 product-detail-slider">
                            <div class="wrapper">
                                <div class="Gallery swiper-container img-magnifier-container" id="gallery">
                                    <div class="swiper-wrapper myimgs">
                                        <div class="swiper-slide"> <a href="{{asset('/storage/img'.'/'.$product->Picture)}}" data-fancybox="1" title="Zoom In"><img class="myimage" src="{{asset('/storage/img'.'/'.$product->Picture)}}" alt="gallery"></a></div>
                                        @foreach($pictures as $value)
                                        <div class="swiper-slide"> <a href="{{asset('/storage/img'.'/'.$value->picture)}}" data-fancybox="1" title="Zoom In"><img class="myimage" src="{{asset('/storage/img'.'/'.$value->picture)}}" alt="gallery"></a></div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="Thumbs swiper-container" id="thumbs">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide"> <img src="{{asset('/storage/img'.'/'.$product->Picture)}}" alt="thumnails"></div>
                                        @foreach($pictures as $value)
                                        <div class="swiper-slide"> <img src="{{asset('/storage/img'.'/'.$value->picture)}}" alt="thumnails"></div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-12 col-lg-6 text-center text-lg-left">
                            <div class="product-single-price">
                                <h4><span class="real-price">{{ number_format($product->Price) }} VND</span>  <span><del> </del></span> </h4>
                                <p class="pro-description"> </p>
                            </div>
                            
                            <div class="product-checklist">
                                <ul>
                                    <li><i class="fas fa-check"></i> Đảm bảo 100% sự hài lòng</li>
                                    <li><i class="fas fa-check"></i> Miễn phí giao hàng với các đơn hàng giá 100,000 VNĐ</li>
                                    <li><i class="fas fa-check"></i> Giao hàng 14 ngày giao hàng</li>
                                </ul>
                            </div>
                            <form action="{{ route('addcart', ['id' => $product->id]) }}" method="get" enctype="multipart/form-data">
                                @csrf
                                <input type="number" class="form-control" name="txtQty" value="1" min="1" max="100" step="1">
                                <div class="row product-quantity input_plus_mins no-gutters">
                                    <!-- <div class="qty col-12 col-lg-3 d-lg-flex align-items-lg-center d-inline-block">
                                        <span class="minus bg-dark"><i class="lni-minus"></i></span>
                                        <input type="number" class="count" name="txtName" value="1">
                                        <span class="plus bg-dark"><i class="lni-plus"></i></span>
                                    </div> -->
                                    <div class="col-12 col-lg-9">
                                        <a href="">
                                            <button type="submit" class="btn green-color-yellow-gradient-btn">THÊM GIỎ HÀNG</button>
                                        </a>
                                    </div>
                                </div>
                            </form>
                            <div class="dropdown-divider"></div>
                            
                            <div class="product-tags-list">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><p class="d-inline">SKU: <span>00012</span></p></li>
                                        <li class="breadcrumb-item"><span class="d-inline">Loại sách: <a href="javascript:void(0)">Classic</a><span class="comma-separtor">,</span><a href="{{ route('listproduct').'/'.$product->category->id }}">{{ $product->category->CategoryName }}</a></span></li>
                                        <li class="breadcrumb-item" aria-current="page"><p class="d-inline">Tags: <a href="{{ route('listproduct').'/'.$product->category->id }}">{{ $product->category->CategoryName }}</a><span class="comma-separtor">,</span><a href="javascript:void(0)">Classic</a></p></li>
                                    </ol>
                                </nav>
                            </div>
                            
                            <div class="share-product-details">
                                <ul class="share-product-icons">
                                    <li><p>Liên kết chia sẻ:</p></li>
                                    <li><a href="javascript:void(0)" class="facebook-bg-hvr"><i class="fab fa-facebook-f" aria-hidden="true"></i></a></li>
                                    <li><a href="javascript:void(0)" class="twitter-bg-hvr"><i class="fab fa-twitter" aria-hidden="true"></i></a> </li>
                                    <li><a href="javascript:void(0)" class="linkedin-bg-hvr"><i class="fab fa-linkedin-in" aria-hidden="true"></i></a></li>
                                    <li><a href="javascript:void(0)" class="instagram-bg-hvr"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        
                        <div class="col-12 mt-4 mb-4">
                            <div class="row no-gutters product-all-details">
                                
                                <ul class="col-12 nav nav-tabs" id="myTab" role="tablist">
                                    <li class="col-4 nav-item">
                                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Mô tả</a>
                                    </li>
                                    <li class="col-4 nav-item">
                                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Các thông tin khác</a>
                                    </li>
                                    <li class="col-4 nav-item">
                                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Khách hàng đánh giá</a>
                                    </li>
                                </ul>
                                <div class="col-12 tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <h6>Số lượng còn lại: {{ $product->Quantity }}</h6>
                                        <p class="product-tab-description text-center text-lg-left">{!! $product->Description !!}</p>
                                         
                                    </div>
                                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                        <div class="row">
                                            <div class="col-12">
                                                <!-- <table class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">#</th>
                                                            <th scope="col">First</th>
                                                            <th scope="col">Last</th>
                                                            <th scope="col">Handle</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <th scope="row">1</th>
                                                            <td>Mark</td>
                                                            <td>Otto</td>
                                                            <td>@mdo</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">2</th>
                                                            <td>Jacob</td>
                                                            <td>Thornton</td>
                                                            <td>@fat</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">3</th>
                                                            <td>Larry</td>
                                                            <td>the Bird</td>
                                                            <td>@twitter</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">4</th>
                                                            <td>Alex</td>
                                                            <td>Thorn</td>
                                                            <td>@mdo</td>
                                                        </tr>
                                                    </tbody>
                                                </table> -->
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="tab-pane fade reviews" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                        @foreach($comments as $comment)
                                        <div class="media">
                                            <div class="row no-gutter">
                                                <div class="col-12 col-lg-2 p-0">
                                                    
                                                    <div class="row no-gutters">
                                                        <div class="col-12 d-flex  justify-content-center">
                                                            <img src="{{ asset('img\user.jpg') }}" alt="Generic placeholder image">
                                                        </div>
                                                        <div class="col-12 d-flex mt-2 justify-content-center">
                                                            <ul class="user-rating">
                                                                <li><a href="#"><i class="lni-star-filled"></i></a></li>
                                                                <li><a href="#"><i class="lni-star-filled"></i></a></li>
                                                                <li><a href="#"><i class="lni-star-filled"></i></a></li>
                                                                <li><a href="#"><i class="lni-star-filled"></i></a></li>
                                                                <li><a href="#"><i class="lni-star"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                                
                                                <div class="col-12 col-lg-10 p-0">
                                                    <div class="media-body ">
                                                        <span class="text-center text-lg-left d-block">{{ \Carbon\Carbon::parse($comment->created_at)->format('d/m/Y') }}</span>
                                                        <h5 class="mb-2 text-center text-lg-left">{{ $comment->name }}</h5>
                                                        <p class="text-center text-lg-left">{{ $comment->content }}</p>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        @endforeach
                                        <!-- <div class="media">
                                            <div class="row no-gutter">
                                                <div class="col-12 col-lg-2 p-0">
                                                    
                                                    <div class="row no-gutters">
                                                        <div class="col-12 d-flex  justify-content-center">
                                                            <img src="{{ asset('img\user2.jpg') }}" alt="Generic placeholder image">
                                                        </div>
                                                        <div class="col-12 d-flex mt-2 justify-content-center">
                                                            <ul class="user-rating">
                                                                <li><a href="#"><i class="lni-star-filled"></i></a></li>
                                                                <li><a href="#"><i class="lni-star-filled"></i></a></li>
                                                                <li><a href="#"><i class="lni-star-filled"></i></a></li>
                                                                <li><a href="#"><i class="lni-star-filled"></i></a></li>
                                                                <li><a href="#"><i class="lni-star"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                                
                                                <div class="col-12 col-lg-10 p-0">
                                                    <div class="media-body ">
                                                        <span class="text-center text-lg-left d-block">27 Aug 2017</span>
                                                        <h5 class="mb-2 text-center text-lg-left">Media heading</h5>
                                                        <p class="text-center text-lg-left">Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam.</p>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div> -->
                                        
                                        <div class="row pl-2 pr-2">
                                            <div class="col-12 d-flex mb-4 mt-3">
                                                <h5 class="text-nowrap">Đánh giá</h5>
                                                <hr class="w-100 ml-5">
                                            </div>
                                            <div class="col-12">
                                                
                                                <form class="getin_form border-form" id="register" class="contact-form" id="contact-form-data" action="{{ route('comment',$product->id) }}" method="post"">
                                                    @csrf
                                                    <input type="hidden" name="ProductId" value="{{ $product->id }}">
                                                    <div class="row">
                                                        
                                                        <div class="col-md-6 col-sm-12">
                                                            <div class="form-group bottom35">
                                                                <input type="text" class="form-control" name="name" placeholder="Tên bạn*" required="required" id="registerName">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-12">
                                                            <div class="form-group bottom35">
                                                                <input type="email" class="form-control" name="email" placeholder="Email*" required="required" id="registerEmail">
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-lg-2 text-center text-lg-left">
                                                            <h5 class="text-nowrap">Đánh giá của bạn</h5>
                                                        </div>
                                                        <div class="col-12 col-lg-10 text-center text-lg-left">
                                                            <ul class="user-rating">
                                                                <li><a href="#"><i class="lni-star-filled"></i></a></li>
                                                                <li><a href="#"><i class="lni-star-filled"></i></a></li>
                                                                <li><a href="#"><i class="lni-star-filled"></i></a></li>
                                                                <li><a href="#"><i class="lni-star-filled"></i></a></li>
                                                                <li><a href="#"><i class="lni-star"></i></a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="comment">Đánh giá của bạn:</label>
                                                                <textarea class="form-control textareaclass" name="content" rows="5" id="comment" required="required" placeholder="Đánh giá của bạn"></textarea>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-12 mt-3">
                                                            <div class="form-group d-flex justify-content-center d-lg-block">
                                                                <button type="submit" class="text-center btn green-color-yellow-gradient-btn">Đánh giá</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                                
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        
                    </div>
                    
                    
                </div>
                
            </div>
        </div>
    </div>
    
    <!--START LATEST ARRIVALS-->
    <div class="lastest_arrivals">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-4">
                    <h1>Sách Nổi Bật</h1>
                </div>
                
                <div class="col-12">
                    <div class="lastest_featured_products owl-carousel owl-theme">
                        
                        @foreach($product_pay as $product)
                        <div class="lastest_arrival_items item">
                            <a href="{{ route('addcart', ['id' => $product->product->id]) }}" class="lastest-addto-cart"><i class="fa fa-shopping-cart"></i></a>
                            <div class="card">
                                <span class="product-type">NEW</span>
                                <div class="image-holder">
                                    <a href="{{asset('/storage/img'.'/'.$product->product->Picture)}}" data-fancybox="lastest_product" data-title="Shirt Name">
                                        <img src="{{asset('/storage/img'.'/'.$product->product->Picture)}}" class="card-img-top" title="{{ $product->product->ProductName }}" alt="{{ $product->product->ProductName }}">
                                    </a>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12 text-center">
                                            <a href="{{ route('product_detail').'/'.$product->product->id }}"><h5 class="card-title">{{ $product->product->ProductName }}</h5></a> 
                                        </div>
                                        <div class="col-12 text-center">
                                            <p class="card-text">{{ number_format($product->product->Price) }} VND</p>
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
    
</div>
<!-- END HEADING SECTION -->
@endsection