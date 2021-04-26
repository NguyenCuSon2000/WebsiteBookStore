@extends('layout')

@section('content')
<!--slider sec strat-->
<section id="slider-sec" class="slider-sec parallax" style="background: url({{asset('img'.'/'.'banner1.3.jpg')}});">
</section>
<!--slider sec end-->

<!-- START HEADING SECTION -->
<div class="about_content">
    
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-10  text-center text-lg-left wow slideInUp" data-wow-duration="2s">
                <h1 class="heading">Giỏ hàng</h1>
                <p class="para_text">"Việc đọc rất quan trọng. Nếu bạn biết cách đọc, cả thế giới sẽ mở ra cho bạn.” <b>- Barack Obama -</b></p>
            </div>
        </div>
    </div>
    
    
    <!-- START SHOP CART SECTION -->
    <div class="shop-cart wow slideInUp" data-wow-duration="2s">
        <div class="container">
            <!-- START SHOP CART TABLE -->
            <div class="row pt-5">
                <div class="col-12 col-md-12  cart_table wow fadeInUp animated" data-wow-delay="300ms" style="visibility: visible; animation-delay: 300ms; animation-name: fadeInUp;">
                    <div class="table-responsive">
                        <table class="table table-bordered border-radius">
                            <thead>
                                <tr>
                                    <th class="darkcolor">Product</th>
                                    <th class="darkcolor">Price</th>
                                    <th class="darkcolor">Quantity</th>
                                    <th class="darkcolor">Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cart as $key)
                                <tr>
                                    <td>
                                        <div class="d-table product-detail-cart">
                                            <div class="media">
                                                <div class="row no-gutters">
                                                    
                                                    <div class="col-12 col-lg-2 product-detail-cart-image">
                                                        <a class="shopping-product" href="javascript:void(0)"><img src="{{ asset('img'.'/'.$key->options->img) }}" alt="{{ $key->name}} "></a>
                                                    </div>
                                                    
                                                    <div class="col-12 col-lg-10 mt-auto product-detail-cart-data">
                                                        <div class="media-body ml-lg-3">
                                                            <h4 class="product-name"><a href="{{ route('product_detail').'/'.$key->id }}">{{ $key->name }}</a></h4>
                                                            <p class="product-des">{{ $key->options->category }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <h4 class="text-center amount">{{ number_format($key->price) }} VND</h4>
                                    </td>
                                    <td class="text-center">
                                        <div class="quote text-center mt-1">
                                            <!-- <div class="form-group"> -->
                                                <form action="{{ route('cart.update', $key->rowId) }}" method="post">
                                                    @csrf
                                                    @method("PUT")
                                                    <input type="hidden" value="{{ $key->rowId }}" name="rowId_cart" class="form-control">
                                                    <input type="number" name="qty" id="qty" value="{{ $key->qty }}" placeholder="1" class="quote" min="1" max="100">
                                                    <input type="submit" value="Cập nhật">
                                                </form>
                                                
                                            <!-- </div> -->
                                        </div>
                                    </td>
                                    <td>
                                        <h4 class="text-center amount">{{ number_format($key->price * $key->qty) }} VND</h4>
                                    </td>
                                    <td class="text-center">
                                        <form action="{{ route('cart.destroy', $key->rowId) }}" method="post">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <button type="submit" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')"><i class="lni-trash"></i></button>   
                                        </form>
                                        <!-- <a class="btn-close" name="close1" href=""><i class="lni-trash"></i></a> -->
                                    </td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td>
                                        
                                    </td>
                                    <td>
                                    </td>
                                    <td class="text-center">
                                        Tổng cộng
                                    </td>
                                    <td>
                                        <h4 class="text-center amount">{{ Cart::total(0,3).' '.'VND' }}</h4>
                                    </td>
                                    <td class="text-center"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="apply_coupon">
                        <div class="row">
                            <div class="col-12 text-left">
                                <a href="shop-cart.html" class="btn yellow-color-green-gradient-btn">CẬP NHẬT</a>
                                <a href="{{ route('pay') }}" class="btn green-color-yellow-gradient-btn ">ĐẶT HÀNG</a>
                            </div>
                            <!--                            <div class="col-6  coupon text-left">-->
                                <!--                                <a href="shop-cart.html" class="btn pink-color-black-gradient-btn ">CHECKOUT</a>-->
                                <!--                            </div>-->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END SHOP CART TABLE -->
                
                <!-- START SHOP CART CHECKOUT FORM -->
                <div class="row pt-5">
                    <div class="col-12 col-lg-6 wow slideInLeft" data-wow-duration="2s">
                        <div class="calculate-shipping">
                            <h4 class="heading">Tính toán vận chuyển</h4>
                            <form>
                                <div class="form-group">
                                    <label class="select form-control">
                                        <select name="country" id="states">
                                            <option>USA</option>
                                            <option>Canada</option>
                                            <option>Chile</option>
                                            <option>France</option>
                                        </select>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label class="select form-control">
                                        <select name="country" id="state">
                                            <option>USA</option>
                                            <option>Canada</option>
                                            <option>Chile</option>
                                            <option>France</option>
                                        </select>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Postal/Zip Code">
                                </div>
                                <a href="#" class="btn yellow-color-green-gradient-btn">Tính toán</a>
                            </form>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 wow slideInRight" data-wow-duration="2s">
                        <div class="card-total">
                            <h4 class="heading">Thẻ tổng tiền</h4>
                            <table>
                                <tr>
                                    <td>Tổng phụ</td>
                                    <td>{{ Cart::subtotal(0,3) }}</td>
                                </tr>
                                <tr>
                                    <td>Thuế</td>
                                    <td>{{ Cart::tax().' '.'VND' }}</td>
                                </tr>
                                <tr>
                                    <td>Giao hàng</td>
                                    <td>
                                        <ul class="color-grey">
                                            <li>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="flat-rate" name="shipping" class="custom-control-input" checked="">
                                                    <label class="custom-control-label" for="flat-rate">Giá cố định : 50,000đ</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="free-shipping" name="shipping" class="custom-control-input">
                                                    <label class="custom-control-label" for="free-shipping">Miễn phí giao hàng</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="cod-shipping" name="shipping" class="custom-control-input">
                                                    <label class="custom-control-label" for="cod-shipping">Thanh toán khi giao hàng</label>
                                                </div>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Tổng cộng</td>
                                    <td>{{ Cart::total(0,3).' '.'VND' }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- END SHOP CART CHECKOUT FORM -->
                
            </div>
        </div>
        <!-- END SHOP CART SECTION-->
        
    </div>
    <!-- END HEADING SECTION -->
    @endsection