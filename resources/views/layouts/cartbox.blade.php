 
     <div class="cart-box-overlay">
        <a><i class="fas fa-times cross-sign" id="close-window1"></i></a>
        
        <div class="container">
            <div class="row">
                <div class="search-listing row">
                    <div class="col-12 mb-4">
                        <h4 class="">Giỏ hàng</h4>
                    </div>
                    <div class="col-12">
                        <div class="listing-search-scroll">
                            @foreach($cart as $key)
                                <div class="media row">
                                    <div class="img-holder ml-1 mr-2 col-4">
                                        <a href="javascript:void(0)"><img src="{{ asset('img'.'/'.$key->options->img) }}" class="align-self-center" alt="{{ $key->name}}"></a>
                                    </div>
                                    <div class="media-body mt-auto mb-auto col-8">
                                        <h5 class="name"><a href="javascript:void(0)">{{ $key->name}}</a></h5>
                                        <span class="quantity">Số lượng: {{ $key->qty }}</span>
                                        <p class="price">Giá: {{ number_format($key->price * $key->qty).' '.'VND' }}</p>
                                        <a class="btn black-sm-btn" href="{{ route('cart.index') }}"><i class="fas fa-shopping-bag"></i></a>
                                        <a class="btn black-sm-btn" href="{{ route('product_detail').'/'.$key->id }}"><i class="fas fa-eye"></i></a>
                                    </div>
                                </div>
                            @endforeach
                          
                        </div>
                    </div>
                </div>
            </div>
            <div class="bag-btn">
                <h4 class="total"><span>Tổng cộng: </span> {{ Cart::subtotal(0,3)." "."VND" }} </h4>
                <a href="{{ route('cart.index') }}" class="btn green-color-yellow-gradient-btn">Xem giỏ hàng </a>
                @if(Cart::count() > 0)
                <?php
                    $user_id = Session::get("user_id");
                    if ($user_id != null) { 
                ?>
                        <a href="{{ route('checkout') }}" class="btn yellow-color-green-gradient-btn">Đặt hàng </a>
                <?php } else { ?>
                    <a href="{{ route('get_login_order') }}" class="btn yellow-color-green-gradient-btn">Đặt hàng</a>
                    <?php } ?>
                <!-- <a href="{{ route('checkout') }}" class="btn yellow-color-green-gradient-btn">Đặt hàng </a> -->
                @endif
            </div>
            
        </div>
        
    </div>