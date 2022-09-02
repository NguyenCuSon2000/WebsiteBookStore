<div class="ml-auto nav-mega d-flex justify-content-end align-items-center">
    <header class="site-header" id="header">
        <nav class="navbar navbar-expand-md  static-nav">
            <div class="container position-relative megamenu-custom">
                <a class="navbar-brand center-brand" href="{{ route('index') }}">
                    <img src="{{asset('img/logo.png')}}" alt="logo" class="logo-scrolled">
                </a>
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('index') }}">TRANG CHỦ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('introduce') }}">GIỚI THIỆU</a>
                        </li>
                        <li class="nav-item dropdown static">
                            <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> SÁCH </a>
                            <ul class="dropdown-menu megamenu flexable-megamenu">
                                <li>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-6 col-sm-12 mengmenu_border">
                                                <h5 class="dropdown-title bottom10"> Chủ đề </h5>                                                
                                                <ul id="menu">
                                                    @foreach($categories as $category)
                                                    <li style=" {{ $category->Status==0?'display:none':'display:block' }}">
                                                        <i class="lni-angle-double-right right-arrow"></i>
                                                        <a class="dropdown-item" href="{{ route('listproduct').'/'.$category->id }}">{{$category->CategoryName}}</a>
                                                    </li>
                                                    @endforeach
                                                    
                                                </ul>
                                                
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-12 mengmenu_border">
                                                <h5 class="dropdown-title opacity-10"> Sách nổi bật </h5>
                                                <ul>
                                                    @foreach($product_pay as $product)
                                                    <li><i class="lni-angle-double-right right-arrow"></i><a class="dropdown-item" href="{{ route('product_detail').'/'.$product->product->id }}">{{ $product->product->ProductName }}</a></li>
                                                    @endforeach
                                                </ul>
                                                
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-12 mengmenu_border">
                                                <h5 class="dropdown-title bottom10"> Tác giả </h5>
                                                
                                                <div class="media outlet-media mt-3">
                                                    <div class="box">
                                                        <img class="align-self-start" src="{{ asset('img/author5.jpg') }}" alt="Generic placeholder image">
                                                    </div>
                                                    <div class="media-body">
                                                        <h6 class="mt-3 ml-3"><a href="#">Nguyễn Nhật Ánh</a></h6>
                                                    </div>
                                                </div>
                                                
                                                <div class="media outlet-media">
                                                    <div class="box">
                                                        <img class="align-self-start" src="{{ asset('img/author6.jpg') }}" alt="Generic placeholder image">
                                                    </div>
                                                    <div class="media-body">
                                                        <h6 class="mt-3 ml-3"><a href="#">Trần Đăng Khoa</a></h6>
                                                    </div>
                                                </div>
                                                
                                                <div class="media outlet-media">
                                                    <div class="box">
                                                        <img class="align-self-start" src="{{ asset('img/author7.jpg') }}" alt="Generic placeholder image">
                                                    </div>
                                                    <div class="media-body">
                                                        <h6 class="mt-3 ml-3"><a href="#">Nhà thơ Nguyễn Khoa Điềm</a></h6>
                                                    </div>
                                                </div>
                                                
                                                
                                                <div class="media outlet-media">
                                                    <div class="box">
                                                        <img class="align-self-start" src="{{ asset('img/author8.jpg') }}" alt="Generic placeholder image">
                                                    </div>
                                                    <div class="media-body">
                                                        <h6 class="mt-3 ml-3"><a href="#">Nhà văn Tô Hoài</a></h6>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            <!-- <div class="col-lg-3 col-md-6 col-sm-12 pt-3">
                                                <a href="javascript:void(0);"><img src="{{ asset('img/featured-product.jpg') }}" alt="image"></a>
                                            </div> -->
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('new') }}">TIN TỨC</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('contact') }}">LIÊN HỆ</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        
        <!-- side menu -->
        <div class="side-menu opacity-0 gradient-bg hidden">
            <div class="inner-wrapper">
                <span class="btn-close btn-close-no-padding" id="btn_sideNavClose"><i></i><i></i></span>
                <nav class="side-nav w-100">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="book-shop/product-listing.html"> TRANG CHỦ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('introduce') }}">GIỚI THIỆU</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link collapsePagesSideMenu" data-toggle="collapse" href="#sideNavPages3">
                                SÁCH <i class="fas fa-chevron-down"></i>
                            </a>
                            <div id="sideNavPages3" class="collapse sideNavPages">
                                <ul class="navbar-nav mt-2">
                                    @foreach($categories as $category)
                                    <li class="nav-item" style=" {{ $category->Status==0?'display:none':'display:block' }}">
                                        <a class="nav-link" href="{{ route('listproduct').'/'.$category->id }}">{{$category->CategoryName}}</a>
                                    </li>
                                    @endforeach
                                </ul>
                                <h5 class="sub-title">Sách nổi bật</h5>
                                <ul class="navbar-nav mt-2">
                                    @foreach($product_pay as $product)
                                    <li class="nav-item" ><a class="nav-link" href="{{ route('product_detail').'/'.$product->product->id }}">{{ $product->product->ProductName }}</a></li>
                                  @endforeach
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('new') }}">TIN TỨC</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('contact') }}">LIÊN HỆ</a>
                        </li>
                    </ul>
                </nav>
                <div class="side-footer w-100">
                    <ul class="social-icons-simple white top40">
                        <li><a class="facebook-bg-hvr" href="javascript:void(0)"><i class="fab fa-facebook-f"></i> </a> </li>
                        <li><a class="twitter-bg-hvr" href="javascript:void(0)"><i class="fab fa-twitter"></i> </a> </li>
                        <li><a class="instagram-bg-hvr" href="javascript:void(0)"><i class="fab fa-instagram"></i> </a> </li>
                    </ul>
                    <p class="whitecolor">&copy; 2021 - Sản phẩm của Nguyễn Cư Sơn <span id="year"></span> </p>
                </div>
            </div>
        </div>
        <div id="close_side_menu" class="tooltip"></div>
        <!-- End side menu -->
    </header>
    <div class="nav-utility">
        <div class="manage-icons d-inline-block">
            <ul class="d-flex justify-content-center align-items-center">
                <li class="d-inline-block">
                    <a id="add_search_box">
                        <i class="lni lni-search search-sidebar-hover"></i>
                    </a>
                </li>
                <li class="d-inline-block mini-menu-card">
                    <a class="nav-link" id="add_cart_box" href="javascript:void(0)">
                        <i class="lni lni-shopping-basket"></i> <sup>{{ Cart::count() }}</sup> 
                    </a>
                </li>
                <a href="javascript:void(0)" class="d-inline-block sidemenu_btn d-block" id="sidemenu_toggle">
                    <i class="lni lni-menu"></i>
                </a>
            </ul>
        </div>
    </div>
</div>