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
                        <li class="nav-item dropdown static">
                            <a class="nav-link dropdown-toggle active" href="javascript:void(0)" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> SÁCH ĐIỆN TỬ</a>
                            <ul class="dropdown-menu megamenu flexable-megamenu">
                                <li>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-3 col-md-6 col-sm-12 mengmenu_border">
                                                <h5 class="dropdown-title"> Truyện - Tiểu thuyết </h5>
                                                <ul>
                                                 
                                                    <li><i class="lni-angle-double-right right-arrow"></i><a class="dropdown-item" href="book-shop/product-listing.html">Sách nổi bật</a></li>

                                                </ul>
                                                <h5 class="dropdown-title"> Sách giáo trình </h5>
                                                <ul>
                                          
                                                    <li><i class="lni-angle-double-right right-arrow"></i><a class="dropdown-item" href="book-shop/product-listing.html">Sách nổi bật</a></li>

                                                </ul>
                                            </div>
                                            <div class="col-lg-3 col-md-6 col-sm-12 mengmenu_border">
                                                <h5 class="dropdown-title"> Khoa học công nghệ </h5>
                                                <ul>
                                                    <li><i class="lni-angle-double-right right-arrow"></i><a class="dropdown-item" href="book-shop/product-listing.html">Sách nổi bật</a></li>
                                                   
                                                </ul>
                                                
                                                <h5 class="dropdown-title"> Văn học nghệ thuật</h5>
                                                <ul>
                                                    <li><i class="lni-angle-double-right right-arrow"></i><a class="dropdown-item" href="book-shop/product-listing.html">Sách nổi bật</a></li>
                                                  
                                                </ul>
                                                
                                            </div>
                                            <div class="col-lg-6 col-md-12 col-sm-12">
                                                <h5 class="dropdown-title text-left">Hình ảnh </h5>
                                                <div class="carousel-menu mt-4">
                                                    <div class="featured-megamenu-carousel owl-carousel owl-theme">
                                                        <div class="item ">
                                                            <img src="{{ asset('img/shop1.jpg') }}" alt="shop-image">
                                                        </div>
                                                        <div class="item">
                                                            <img src="{{ asset('img/shop2.jpg') }}" alt="shop-image">
                                                        </div>
                                                    </div>
                                                    <i class="lni-chevron-left ini-customPrevBtn"></i>
                                                    <i class="lni-chevron-right ini-customNextBtn"></i>
                                                </div>
                                                <p class="mt-4 megamenu-slider-para"></p>
                                                <a href="book-shop/product-listing.html" class="btn black-border-color-yellow-gradient-btn slider-btn text-left">Mua ngay</a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown static">
                            <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> SÁCH </a>
                            <ul class="dropdown-menu megamenu flexable-megamenu">
                                <li>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-3 col-md-6 col-sm-12 mengmenu_border">
                                                <h5 class="dropdown-title bottom10"> Chủ đề </h5>                                                
                                                <ul id="menu">
                                                @foreach($categories as $category)
                                                    <li><i class="lni-angle-double-right right-arrow"></i><a class="dropdown-item" href="{{ route('listproduct').'/'.$category->id }}">{{$category->CategoryName}}</a></li>
                                                @endforeach
                                                    <!-- 
                                                    <li><i class="lni-angle-double-right right-arrow"></i><a class="dropdown-item" href="book-shop/product-listing.html">Autobiography</a></li>
                                                    <li><i class="lni-angle-double-right right-arrow"></i><a class="dropdown-item" href="book-shop/product-listing.html">Biography</a></li>
                                                    <li><i class="lni-angle-double-right right-arrow"></i><a class="dropdown-item" href="book-shop/product-listing.html">Chick lit</a></li>
                                                    <li><i class="lni-angle-double-right right-arrow"></i><a class="dropdown-item" href="book-shop/product-listing.html">Anthology</a></li>
                                                    <li><i class="lni-angle-double-right right-arrow"></i><a class="dropdown-item" href="book-shop/product-listing.html">Coming-of-age</a></li>
                                                    <li><i class="lni-angle-double-right right-arrow"></i><a class="dropdown-item" href="book-shop/product-listing.html">Drama</a></li>
                                                        -->
                                                </ul>
                                                
                                            </div>
                                            <div class="col-lg-3 col-md-6 col-sm-12 mengmenu_border">
                                                <h5 class="dropdown-title opacity-10"> Khác </h5>
                                                <ul>
                                                    <li><i class="lni-angle-double-right right-arrow"></i><a class="dropdown-item" href="book-shop/product-listing.html">Trinh thám</a></li>
                                                    <li><i class="lni-angle-double-right right-arrow"></i><a class="dropdown-item" href="book-shop/product-listing.html">Từ điển</a></li>
                                                    <li><i class="lni-angle-double-right right-arrow"></i><a class="dropdown-item" href="book-shop/product-listing.html">Sức khỏe</a></li>
                                                    <li><i class="lni-angle-double-right right-arrow"></i><a class="dropdown-item" href="book-shop/product-listing.html">Lịch sử</a></li>
                                                    <li><i class="lni-angle-double-right right-arrow"></i><a class="dropdown-item" href="book-shop/product-listing.html">Tạp chí</a></li>
                                                    <li><i class="lni-angle-double-right right-arrow"></i><a class="dropdown-item" href="book-shop/product-listing.html">Kinh dị</a></li>
                                                    <li><i class="lni-angle-double-right right-arrow"></i><a class="dropdown-item" href="book-shop/product-listing.html">Thơ</a></li>
                                                </ul>
                                                
                                            </div>
                                            <div class="col-lg-3 col-md-6 col-sm-12 mengmenu_border">
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
                                            <div class="col-lg-3 col-md-6 col-sm-12 pt-3">
                                                <a href="javascript:void(0);"><img src="{{ asset('img/featured-product.jpg') }}" alt="image"></a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown position-relative">
                            <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">TIN TỨC</a>
                            <div class="dropdown-menu">
                                <ul>
                                    <li><i class="lni-angle-double-right right-arrow"></i><a class="dropdown-item" href="book-shop/product-listing.html">TIN NỔI BẬT</a></li>
                                    <li><i class="lni-angle-double-right right-arrow"></i><a class="dropdown-item" href="book-shop/product-detail.html">TIN SÁCH MỚI</a></li>
                                    <li><i class="lni-angle-double-right right-arrow"></i><a class="dropdown-item" href="book-shop/shop-cart.html.html">TIN SÁCH XUẤT BẢN</a></li>
                                </ul>
                            </div>
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
                            <a class="nav-link collapsePagesSideMenu" data-toggle="collapse" href="#sideNavPages1">
                                SÁCH ĐIỆN TỬ <i class="fas fa-chevron-down"></i>
                            </a>
                            <div id="sideNavPages1" class="collapse sideNavPages">
                                <h5 class="sub-title">1. Truyện - Tiểu thuyết</h5>
                                <ul class="navbar-nav mt-2">

                                    <li class="nav-item"><a class="nav-link" href="book-shop/product-listing.html">Sách nổi bật</a></li>
                                   
                                </ul>
                                <h5 class="sub-title">2. Khoa học - Công nghệ</h5>
                                <ul class="navbar-nav mt-2">

                                    <li class="nav-item"><a class="nav-link" href="book-shop/product-listing.html">Sách nổi bật</a></li>
                                  
                                </ul>
                                
                                <h5 class="sub-title">3. Sách giáo trình</h5>
                                <ul class="navbar-nav mt-2">

                                    <li class="nav-item"><a class="nav-link" href="book-shop/product-listing.html">Sách nổi bật</a></li>
                                   
                                </ul>
                                
                                <h5 class="sub-title">4. Văn học nghệ thuật</h5>
                                <ul class="navbar-nav mt-2">

                                    <li class="nav-item"><a class="nav-link" href="book-shop/product-listing.html">Sách nổi bật</a></li>
                                  
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link collapsePagesSideMenu" data-toggle="collapse" href="#sideNavPages3">
                                SÁCH <i class="fas fa-chevron-down"></i>
                            </a>
                            <div id="sideNavPages3" class="collapse sideNavPages">
                                <ul class="navbar-nav mt-2">
                                @foreach($categories as $category)
                                    <li class="nav-item"><a class="nav-link" href="{{ route('listproduct').'/'.$category->id }}">{{$category->CategoryName}}</a></li>
                                @endforeach
                                    <!-- <li class="nav-item"><a class="nav-link" href="book-shop/product-listing.html">Autobiography</a></li>
                                    <li class="nav-item"><a class="nav-link" href="book-shop/product-listing.html">Biography</a></li>
                                    <li class="nav-item"><a class="nav-link" href="book-shop/product-listing.html">Chick lit</a></li>
                                    <li class="nav-item"><a class="nav-link" href="book-shop/product-listing.html">Coming-of-age</a></li>
                                    <li class="nav-item"><a class="nav-link" href="book-shop/product-listing.html">Anthology</a></li>
                                    <li class="nav-item"><a class="nav-link" href="book-shop/product-listing.html">Drama</a></li> -->
                                </ul>
                                <h5 class="sub-title">1. Khác</h5>
                                <ul class="navbar-nav mt-2">
                                    <li class="nav-item"><a class="nav-link" href="book-shop/product-listing.html">Tiểu thuyết</a></li>
                                    <li class="nav-item"><a class="nav-link" href="book-shop/product-listing.html"> Từ điển </a></li>
                                    <li class="nav-item"><a class="nav-link" href="book-shop/product-listing.html"> Sức khỏe</a></li>
                                    <li class="nav-item"><a class="nav-link" href="book-shop/product-listing.html">Lịch sử</a></li>
                                    <li class="nav-item"><a class="nav-link" href="book-shop/product-listing.html">Kinh dị</a></li>
                                    <li class="nav-item"><a class="nav-link" href="book-shop/product-listing.html">Hài hước</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link collapsePagesSideMenu" data-toggle="collapse" href="#sideNavPages2">
                                TIN TỨC <i class="fas fa-chevron-down"></i>
                            </a>
                            <div id="sideNavPages2" class="collapse sideNavPages">
                                <ul class="navbar-nav">
                                    <li class="nav-item">
                                        <a class="nav-link" href="book-shop/product-listing.html">TIN NỔI BẬT</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="book-shop/product-detail.html">TIN SÁCH MỚI</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="book-shop/shop-cart.html">TIN SÁCH XUẤT BẢN</a>
                                    </li>
                                </ul>
                            </div>
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
                    <p class="whitecolor">&copy; <span id="year"></span> </p>
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