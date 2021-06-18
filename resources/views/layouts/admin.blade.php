<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/main.css')}} ">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
                            <p class="left__name"> </p>
                        </div>
                     
                        <ul class="left__menu">
                            <li class="left__menuItem">
                                <a href="{{ route('/admin/index') }}" class="left__title"><img src="{{asset('assets/icon-dashboard.svg')}}" alt="">Trang chủ</a>
                            </li>
                            <li class="left__menuItem">
                                <div class="left__title"><img src="{{asset('assets/grid.svg')}}" alt="">Thể Loại<img class="left__iconDown" src="{{asset('assets/arrow-down.svg')}}" alt=""></div>
                                <div class="left__text">
                                    <a class="left__link" href="{{ route('category.create') }}">Thêm Thể Loại</a>
                                    <a class="left__link" href="{{ route('category.index') }}">Xem Thể Loại</a>
                                </div>
                            </li>
                            <li class="left__menuItem">
                                <div class="left__title"><img src="{{asset('assets/icon-tag.svg')}}" alt="">Sản Phẩm<img class="left__iconDown" src="{{asset('')}}assets/arrow-down.svg" alt=""></div>
                                <div class="left__text">
                                    <a class="left__link" href="{{ route('product.create') }}">Thêm Sản Phẩm</a>
                                    <a class="left__link" href="{{ route('product.index') }}">Xem Sản Phẩm</a>
                                </div>
                            </li>
                            <li class="left__menuItem">
                                <div class="left__title"><img src="{{asset('assets/tag-alt.svg')}}" alt="">Khuyến mại<img class="left__iconDown" src="{{asset('')}}assets/arrow-down.svg" alt=""></div>
                                <div class="left__text">
                                    <a class="left__link" href="{{ route('discount.create') }}">Thêm khuyến mại</a>
                                    <a class="left__link" href="{{ route('discount.index') }}">Liệu kê danh sách</a>
                                </div>
                            </li>
                            <li class="left__menuItem">
                                <div class="left__title"><img src="{{asset('assets/icon-pencil.svg')}}" alt="">Tin tức<img class="left__iconDown" src="{{asset('assets/arrow-down.svg')}}" alt=""></div>
                                <div class="left__text">
                                    <a class="left__link" href="{{ route('news.create') }}">Thêm tin </a>
                                    <a class="left__link" href="{{ route('news.index') }}">Quản lý tin tức</a>
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
                                <div class="left__title"><img src="{{asset('assets/icon-picture.svg')}}" alt="">Hình ảnh<img class="left__iconDown" src="{{asset('assets/arrow-down.svg')}}" alt=""></div>
                                <div class="left__text">
                                    <a class="left__link" href="{{ route('picture.create') }}">Thêm hình ảnh</a>
                                    <a class="left__link" href="{{ route('picture.index') }}">Xem hình ảnh</a>
                                </div>
                            </li>
                            <li class="left__menuItem">
                                <div class="left__title"><img src="{{asset('assets/icon-book.svg')}}" alt="">Quản lý quyền<img class="left__iconDown" src="{{asset('assets/arrow-down.svg')}}" alt=""></div>
                                <div class="left__text">
                                    <a class="left__link" href="{{ route('role.index') }}">Xem quyền</a>
                                    <a class="left__link" href="{{ route('role.create') }}">Thêm quyền</a>
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
                                <div class="left__title"><img src="{{asset('assets/icon-user.svg')}}" alt="">Người dùng<img class="left__iconDown" src="{{asset('assets/arrow-down.svg')}}" alt=""></div>
                                <div class="left__text">
                                    <a class="left__link" href="{{ route('user.create') }}">Thêm người dùng</a>
                                    <a class="left__link" href="{{ route('user.index') }}">Xem người dùng</a>
                                </div>
                            </li>
                           
                            <li class="left__menuItem">
                                <div class="left__title"><img src="{{asset('assets/line-chart.svg')}}" alt="">Thống kê sản phẩm<img class="left__iconDown" src="{{asset('assets/arrow-down.svg')}}" alt=""></div>
                                <div class="left__text">
                                    <a class="left__link" href="/statistic/index">Thống kê sản phẩm</a>
                                    <a class="left__link" href="/statistic/comment_count">Đánh giá nổi bật</a>
                                </div>
                            </li>
                            <li class="left__menuItem">
                                <div class="left__title"><img src="{{asset('assets/chart.svg')}}" alt="">Thống kê đơn hàng<img class="left__iconDown" src="{{asset('assets/arrow-down.svg')}}" alt=""></div>
                                <div class="left__text">
                                    <a class="left__link" href="/statistic/order_pay">Thống kê đơn hàng</a>
                                    <a class="left__link" href="/statistic/order_highlight">Đơn hàng nổi bật</a>
                                </div>
                            </li>
                            <li class="left__menuItem">
                                <div class="left__title"><img src="{{asset('assets/poll.svg')}}" alt="">Thống kê hàng tháng<img class="left__iconDown" src="{{asset('assets/arrow-down.svg')}}" alt=""></div>
                                <div class="left__text">
                                    <a class="left__link" href="/statistic/order_time">Thống kê doanh thu</a>
                                    <a class="left__link" href="/statistic/order_count">Thống kê số lượng</a>
                                </div>
                            </li>
                            <li class="left__menuItem">
                                <a href="{{ route('contact_admin.index') }}" class="left__title"><img src="{{asset('assets/envelope-alt.svg')}}" alt="">Quản lý liên hệ</a>
                            </li>
                            <li class="left__menuItem">
                                <a href="{{ route('comment.index') }}" class="left__title"><img src="{{asset('assets/chat.svg')}}" alt="">Quản lý bình luận</a>
                            </li>
                          
                            <li class="left__menuItem">
                            <form action="{{ route('login') }}" method="post">
                                @csrf
                                <a href="{{ Auth::logout() }}" class="left__title"><img src="{{asset('assets/icon-logout.svg')}}" alt="">Đăng Xuất</a>
                            </form>
                               
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
    <script>
        $(function () { 
            $('.year').change(function () { 
                $('#form_year').submit();
            });
            $('.count').change(function () { 
                $('#form_count').submit();
            });
            $('.hight').change(function () { 
                $('#form_hight').submit();
            });
        })

    </script>
</body>
</html>