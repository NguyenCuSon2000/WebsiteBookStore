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
                                <a class="active" href="{{ route('listproduct').'/'.$product->category->id }}">{{ $product->category->CategoryName }} </a>
                                <span>({{ $product->count }})</span>
                            </li>
                            @endforeach
                            
                        </ul>
                    </div>
                    <div class="product-price mt-1">
                        <h5 class="filter-heading text-center text-lg-left">Khoảng giá</h5>
                         <ul>
                             <li><a class="{{ Request::get('price') == 1 ? 'active' : ''}}" href="{{ request()->fullUrlWithQuery(['price' => 1]) }}">Dưới 50.000 đ</a></li>
                             <li><a class="{{ Request::get('price') == 2 ? 'active' : ''}}" href="{{ request()->fullUrlWithQuery(['price' => 2]) }}">50.000 - 100.000 đ</a></li>
                             <li><a class="{{ Request::get('price') == 3 ? 'active' : ''}}" href="{{ request()->fullUrlWithQuery(['price' => 3]) }}">100.000 - 200.000 đ</a></li>
                             <li><a class="{{ Request::get('price') == 4 ? 'active' : ''}}" href="{{ request()->fullUrlWithQuery(['price' => 4]) }}">200.000 - 300.000 đ</a></li>
                             <li><a class="{{ Request::get('price') == 5 ? 'active' : ''}}" href="{{ request()->fullUrlWithQuery(['price' => 5]) }}">300.000 - 400.000 đ</a></li>
                             <li><a class="{{ Request::get('price') == 6 ? 'active' : ''}}" href="{{ request()->fullUrlWithQuery(['price' => 6]) }}">400.000 - 500.000</a></li>
                             <li><a class="{{ Request::get('price') == 7 ? 'active' : ''}}" href="{{ request()->fullUrlWithQuery(['price' => 7]) }}">Trên 500.000 đ</a></li>
                         </ul>
                    </div>
                    
                    <button class="btn yellow-color-green-gradient-btn mt-1">Lọc</button>
                    
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
                        <h1 class="heading text-left">Danh sách sản phẩm</h1>
                        <p class="para_text text-left">Sách hay, cũng như bạn tốt, ít và được lựa chọn; chọn lựa càng nhiều, thưởng thức càng nhiều. - <b>Louisa May Alcott</b> -</p>
                    </div>
                    <!-- END LISTING HEADING -->

                    <div class="col-6 mt-3 product-listing-sort">
                         <form action="" id="form_display" method="get">
                            <div class="form-group">
                                <label for="">Hiển thị</label>
                                <select class="display" name="display" >
                                    <option {{ Request::get('display') == "md" || !Request::get('display') ? "selected='selected'" : "" }} value="md" selected>Mặc định</option>
                                    <option {{ Request::get('display') == "3" ? "selected='selected'" : "" }} value="3">3</option>
                                    <option {{ Request::get('display') == "6" ? "selected='selected'" : "" }} value="6">6</option>
                                    <option {{ Request::get('display') == "9" ? "selected='selected'" : "" }} value="9">9</option>
                                    <option {{ Request::get('display') == "12" ? "selected='selected'" : "" }} value="12">12</option>
                                    <option {{ Request::get('display') == "15" ? "selected='selected'" : "" }} value="15">15</option>
                                    <option {{ Request::get('display') == "all" ? "selected='selected'" : "" }} value="all">Tất cả</option>
                                </select>
                            </div>
                         </form>
                    </div>

                    <div class="col-6 mt-3 product-listing-sort">
                        <form action="" id="form_order" method="get">
                           <div class="form-group"  style="float: right;">
                               <label for="">Sắp xếp</label>
                               <select class="orderby" name="orderby" >
                                   <option {{ Request::get('orderby') == "md" || !Request::get('orderby') ? "selected='selected'" : "" }} value="md" selected>Mặc định</option>
                                   <option {{ Request::get('orderby') == "desc" ? "selected='selected'" : "" }} value="desc">Mới nhất</option>
                                   <option {{ Request::get('orderby') == "asc" ? "selected='selected'" : "" }} value="asc">Sản phẩm cũ</option>
                                   <option {{ Request::get('orderby') == "price_max" ? "selected='selected'" : "" }} value="price_max">Giá tăng dần</option>
                                   <option {{ Request::get('orderby') == "price_min" ? "selected='selected'" : "" }} value="price_min">Giá giảm dần</option>
                               </select>
                           </div>
                        </form>
                   </div>
                    
                    <!-- START PRODUCT LISTING SECTION -->
                    <div class="col-12 product-listing-products">
                        
                        <!-- START DISPLAY PRODUCT -->
                        <div class="product-list row">
                            @foreach($products as $product)
                            <div style="{{ $product->Status==0?'display:none':'display:block' }}" class="col-12 col-md-6 col-lg-4 manage-color-hover wow slideInUp" data-wow-delay=".2s">
                                <div class="product-item owl-theme product-listing-carousel owl-carousel">
                                    <div class="item p-item-img">
                                        <img src="{{asset('/storage/img'.'/'.$product->Picture)}}" alt="images">
                                        <div class="text-center d-flex justify-content-center align-items-center">
                                            <a class="listing-cart-icon" href="{{ route('addcart', ['id' => $product->id]) }}">
                                                <i class="fa fa-shopping-cart"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="item p-item-img">
                                        <img src="{{asset('/storage/img'.'/'.$product->Picture)}}" alt="images">
                                        <div class="text-center d-flex justify-content-center align-items-center">
                                            <a class="listing-cart-icon" href="{{ route('addcart', ['id' => $product->id]) }}">
                                                <i class="fa fa-shopping-cart"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="p-item-detail">
                                    <h4 class="text-center p-item-name"><a href="{{ route('product_detail').'/'.$product->id }}"> {{ $product->ProductName }} </a></h4>
                                    <p class="text-center p-item-price">{{ number_format($product->Price).' '.'VND' }}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <!-- END DISPLAY PRODUCT -->
                        
                        <div style="margin: 5%" >
                            {{ $products->links() }}
                        </div>
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

