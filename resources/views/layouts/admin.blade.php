<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/main.css')}} ">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>
    <div class="wrapper">
        <div class="container">
            <div class="dashboard">
                <div class="left">
                    <span class="left__icon">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                    <div class="left__content">
                        <div class="left__logo">LOGO</div>
                        <div class="left__profile">
                            <div class="left__image"><img src="{{asset('assets/profile.jpg')}}" alt=""></div>
                            <p class="left__name">
                                <?php
                                    use Illuminate\Support\Facades\Session;
                                    $name = Session::get('username');
                                    if($name){
                                        echo $name;
                                    }
                                ?>   
                            </p>
                        </div>
                        <ul class="left__menu">
                            <li class="left__menuItem">
                                <a href="{{ route('/admin/index') }}" class="left__title"><img src="{{asset('assets/icon-dashboard.svg')}}" alt="">Dashboard</a>
                            </li>
                            <li class="left__menuItem">
                                <div class="left__title"><img src="{{asset('assets/icon-tag.svg')}}" alt="">Sản Phẩm<img class="left__iconDown" src="{{asset('')}}assets/arrow-down.svg" alt=""></div>
                                <div class="left__text">
                                    <a class="left__link" href="{{ route('product.create') }}">Thêm Sản Phẩm</a>
                                    <a class="left__link" href="{{ route('product.index') }}">Xem Sản Phẩm</a>
                                </div>
                            </li>
                            <li class="left__menuItem">
                                <div class="left__title"><img src="{{asset('assets/icon-edit.svg')}}" alt="">Danh Mục Sản Phẩm<img class="left__iconDown" src="{{asset('assets/arrow-down.svg')}}" alt=""></div>
                                <div class="left__text">
                                    <a class="left__link" href="">Thêm danh mục</a>
                                    <a class="left__link" href="">Liệt kê danh mục</a>
                                </div>
                            </li>
                            <li class="left__menuItem">
                                <div class="left__title"><img src="{{asset('assets/icon-book.svg')}}" alt="">Thể Loại<img class="left__iconDown" src="{{asset('assets/arrow-down.svg')}}" alt=""></div>
                                <div class="left__text">
                                    <a class="left__link" href="{{ route('category.create') }}">Thêm Thể Loại</a>
                                    <a class="left__link" href="{{ route('category.index') }}">Xem Thể Loại</a>
                                </div>
                            </li>
                            <li class="left__menuItem">
                                <div class="left__title"><img src="{{asset('assets/icon-settings.svg')}}" alt="">Slide<img class="left__iconDown" src="{{asset('assets/arrow-down.svg')}}" alt=""></div>
                                <div class="left__text">
                                    <a class="left__link" href="insert_slide.html">Chèn Slide</a>
                                    <a class="left__link" href="view_slides.html">Xem Slide</a>
                                </div>
                            </li>
                            <li class="left__menuItem">
                                <div class="left__title"><img src="{{asset('assets/icon-book.svg')}}" alt="">Coupons<img class="left__iconDown" src="{{asset('assets/arrow-down.svg')}}" alt=""></div>
                                <div class="left__text">
                                    <a class="left__link" href="insert_coupon.html">Chèn Coupon</a>
                                    <a class="left__link" href="view_coupons.html">Xem Coupons</a>
                                </div>
                            </li>
                            <li class="left__menuItem">
                                <div class="left__title"><img src="{{asset('assets/icon-users.svg')}}" alt="">Khách hàng<img class="left__iconDown" src="{{asset('assets/arrow-down.svg')}}" alt=""></div>
                                <div class="left__text">
                                    <a class="left__link" href="{{ route('customer.create') }}">Thêm khách hàng</a>
                                    <a class="left__link" href="{{ route('customer.index') }}">Xem khách hàng</a>
                                </div>
                            </li>
                            <li class="left__menuItem">
                                <a href="view_orders.html" class="left__title"><img src="{{asset('assets/icon-book.svg')}}" alt="">Đơn Đặt Hàng</a>
                            </li>
                            <li class="left__menuItem">
                                <a href="edit_css.html" class="left__title"><img src="{{asset('assets/icon-pencil.svg')}}" alt="">Chỉnh CSS</a>
                            </li>
                            <li class="left__menuItem">
                                <div class="left__title"><img src="{{asset('assets/icon-user.svg')}}" alt="">Admin<img class="left__iconDown" src="{{asset('assets/arrow-down.svg')}}" alt=""></div>
                                <div class="left__text">
                                    <a class="left__link" href="insert_admin.html">Chèn Admin</a>
                                    <a class="left__link" href="view_admins.html">Xem Admins</a>
                                </div>
                            </li>
                            <li class="left__menuItem">
                                <a href="{{ route('/logout') }}" class="left__title"><img src="{{asset('assets/icon-logout.svg')}}" alt="">Đăng Xuất</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="right">
                    <div class="right__content">
                        @yield('admin_content')
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="{{asset('js/main.js')}}"></script>
</body>
</html>