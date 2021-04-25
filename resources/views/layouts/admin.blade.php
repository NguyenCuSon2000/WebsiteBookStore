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
                        <div class="left__logo">BOOK STORE</div>
                        <div class="left__profile">
                            <div class="left__image"><img src="{{asset('assets/nguyencuson.jpg')}}" alt=""></div>
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
                                <div class="left__title"><img src="{{asset('assets/icon-edit.svg')}}" alt="">Đơn hàng<img class="left__iconDown" src="{{asset('assets/arrow-down.svg')}}" alt=""></div>
                                <div class="left__text">
                                    <a class="left__link" href="">Thêm đơn hàng</a>
                                    <a class="left__link" href="{{ route('order.index') }}">Liệt kê đơn hàng</a>
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
                                <div class="left__title"><img src="{{asset('assets/icon-settings.svg')}}" alt="">Tin tức<img class="left__iconDown" src="{{asset('assets/arrow-down.svg')}}" alt=""></div>
                                <div class="left__text">
                                    <a class="left__link" href="insert_slide.html">Chèn Tin tức</a>
                                    <a class="left__link" href="view_slides.html">Xem Tin tức</a>
                                </div>
                            </li>
                            <li class="left__menuItem">
                                <div class="left__title"><img src="{{asset('assets/icon-book.svg')}}" alt="">Nhà cung cấp<img class="left__iconDown" src="{{asset('assets/arrow-down.svg')}}" alt=""></div>
                                <div class="left__text">
                                    <a class="left__link" href="insert_coupon.html">Thêm nhà cung cấp</a>
                                    <a class="left__link" href="view_coupons.html">Xem nhà cung cấp</a>
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
                                <div class="left__title"><img src="{{asset('assets/icon-user.svg')}}" alt="">Người dùng<img class="left__iconDown" src="{{asset('assets/arrow-down.svg')}}" alt=""></div>
                                <div class="left__text">
                                    <a class="left__link" href="insert_admin.html">Chèn người dùng</a>
                                    <a class="left__link" href="view_admins.html">Xem người dùng</a>
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
    <script src="{{asset('ckeditor/ckeditor.js')}}"></script>
    <script src="//cdn.ckeditor.com/4.16.0/full/ckeditor.js"></script>
    <script>
        CKEDITOR.replace("ckeditor");
        CKEDITOR.replace("ckeditor1");
        CKEDITOR.replace("ckeditor2");
        CKEDITOR.replace("ckeditor3");
    </script>
</body>
</html>