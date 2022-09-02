<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta Tags For Seo + Page Optimization -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Themes Industry">
    <!-- description -->
    <meta name="description" content="Woman Store is a highly creative, modern, visually stunning and Bootstrap responsive multipurpose agency and HTML5 template with 14 ready home page demos.">
    <!-- keywords -->
    <meta name="keywords" content="creative, modern, clean, bootstrap responsive, h tml5, css3, portfolio, blog, agency, templates, multipurpose, one page, corporate, start-up, studio, branding, designer, freelancer, carousel, parallax, photography, personal, masonry, grid, faq">
    <!-- Page Title -->
    <title>Book Store | Home</title>
    <!-- Favicon -->
    <link rel="icon" href="/dummy-img/favicon.ico">
    <!-- Bundle -->
    <link rel="stylesheet" href="{{asset('vendor/css/bundle.min.css')}}">
    <!-- Plugin Css -->
    <link rel="stylesheet" href="{{asset('vendor/css/jquery.fancybox.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/css/swiper.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/css/cubeportfolio.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/css/wow.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/css/LineIcons.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/nouislider.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/range-slider.css')}}">
    <!-- Slider Setting Css  -->
    <link rel="stylesheet" href="{{asset('css/settings.css')}}">
    <!-- Mega Menu  -->
    <link rel="stylesheet" href="{{asset('css/megamenu.css')}}">
    <!-- StyleSheet  -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <!-- Custom Css  -->
    <link rel="stylesheet" href="{{asset('css/custom.css')}}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css">
</head>
<body>
    
    <a class="scroll-top-arrow" href="javascript:void(0);"><i class="fa fa-angle-up"></i></a>
    
    <!--LOADER-->
    <div class="loader">
        <div class="loader-spinner"></div>
    </div>
    <!--LOADER-->
   
    <!-- START HEADER NAVIGATION -->
    <div class="header-area">
        <div class="container">
            <div class="row upper-nav">
                <div class=" text-left nav-logo">
                    <a href="{{ route('index') }}" class="navbar-brand"><img src="{{asset('img/logo.png')}}" alt="img"></a>
                </div>
                
                @include('layouts.menutop')
                
            </div>
        </div>
    </div>
    <!-- END HEADER NAVIGATION -->
    
    @yield('content')
    
    <!--footer1 sec start-->
    <div class="footer">
        <div class="container">
            <div class="row footer-container">
                <div class="col-sm-12 col-lg-4 f-sec1  text-center text-lg-left">
                    <h4 class="high-lighted-heading">Về chúng tôi</h4>
                    <p>Chúng tôi coi trọng sứ mệnh của mình là tăng cường khả năng tiếp cận toàn cầu với nền giáo dục chất lượng.</p>
                    <a href="#">Đọc thêm</a>
                    <h4>Mạng xã hội</h4>
                    <div class="s-icons">
                        <ul class="social-icons-simple">
                            <li><a href="javascript:void(0)" class="facebook-bg-hvr"><i class="fab fa-facebook-f" aria-hidden="true"></i></a></li>
                            <li><a href="javascript:void(0)" class="twitter-bg-hvr"><i class="fab fa-twitter" aria-hidden="true"></i></a> </li>
                            <li><a href="javascript:void(0)" class="instagram-bg-hvr"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-5 f-sec2 ">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <h4 class="text-center text-md-left">Thông tin</h4>
                            <ul class="text-center text-md-left">
                                <li><a href="{{ route('introduce') }}">Về chúng tôi</a></li>
                                <li><a href="{{ route('new') }}">Tin tức</a></li>
                                <li><a href="{{ route('contact') }}">Liên hệ chúng tôi</a></li>
                                <li><a href="{{ route('index') }}">Các sản phẩm</a></li>
                                <li>
                                    @if (Auth::check()) 
                                        <a href="{{ route('history') }}">Lịch sử mua hàng</a>
                                    @else
                                        <a href="{{ route('get_login_order') }} ">Lịch sử mua hàng</a>
                                    @endif
                                </li>
                            </ul>
                        </div>
                        <div class="col-12 col-md-6">
                            <h4 class="text-center text-md-left">Thông tin tài khoản</h4>
                            <ul class="text-center text-md-left">
                                @if (Auth::check()) 

                                    <li><a href="javascript:void(0)">Hello: {{Auth::user()->username}} !!!</a></li>
                                    <li><a href="javascript:void(0)">Lịch sử đặt hàng</a></li>
                                    <li><a href="javascript:void(0)">Thông tin giao hàng</a></li>
                                    <li><a href="javascript:void(0)">Chính sách hoàn lại tiền</a></li>
                                    <li><a href="javascript:void(0)">Trang web đáp ứng</a></li>
                                    <li><a href="{{ route('logout_checkout') }}">Đăng xuất</a></li>
                                @else
                                    <li><a href="/admin/index">Trang quản trị</a></li>
                                    <li><a href="{{ route('get_login_order') }}">Đăng nhập</a></li>
                                    <li><a href="{{ route('register') }}">Đăng ký</a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-3 f-sec3  text-center text-lg-left">
                    <h4>Danh mục sản phẩm</h4>
                    <div class="foot-tag-list">
                    @foreach($category_footer as $category)
                       <a href="{{ route('listproduct').'/'.$category->id }}" style="{{ $category->Status==0?'display:none':'display:block' }} "><span>{{$category->CategoryName}}</span></a> 
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 footer_notes">
                    <p class="whitecolor text-center w-100 wow fadeInDown">&copy; 2021 - Sản phẩm của Nguyễn Cư Sơn <a class="web-link" href="http://www.themesindustry.com/" target="_blank"></a></p>
                </div>
            </div>
        </div>
    </div>
    <!--foo0ter1 sec end-->
    
    <!--START SEARCH AREA-->
   @include('layouts.search')
    <!--END SEARCH AREA -->
    
    <!--START Cart Box-->
    @include('layouts.cartbox')
    <!--END Cart Box -->   
        
    
    <!-- JavaScript -->
    <script src="{{asset('vendor/js/bundle.min.js')}}"></script>
    <!-- Plugin Js -->
    <script src="{{asset('vendor/js/jquery.fancybox.min.js')}}"></script>
    <script src="{{asset('vendor/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('vendor/js/swiper.min.js')}}"></script>
    <script src="{{asset('vendor/js/jquery.cubeportfolio.min.js')}}"></script>
    <script src="{{asset('vendor/js/wow.min.js')}}"></script>
    <script src="{{asset('vendor/js/bootstrap-input-spinner.js')}}"></script>
    <script src="{{asset('vendor/js/parallaxie.min.js')}}"></script>
    <script src="{{asset('vendor/js/stickyfill.min.js')}}"></script>
    <script src="{{asset('js/nouislider.min.js')}}"></script>

    
    <script src="{{asset('vendor/js/jquery.themepunch.tools.min.js')}}"></script>
    <script src="{{asset('vendor/js/jquery.themepunch.revolution.min.js')}}"></script>
    <!-- SLIDER REVOLUTION EXTENSIONS -->
    <script src="{{asset('vendor/js/extensions/revolution.extension.actions.min.js')}}"></script>
    <script src="{{asset('vendor/js/extensions/revolution.extension.carousel.min.js')}}"></script>
    <script src="{{asset('vendor/js/extensions/revolution.extension.kenburn.min.js')}}"></script>
    <script src="{{asset('vendor/js/extensions/revolution.extension.layeranimation.min.js')}}"></script>
    <script src="{{asset('vendor/js/extensions/revolution.extension.migration.min.js')}}"></script>
    <script src="{{asset('vendor/js/extensions/revolution.extension.navigation.min.js')}}"></script>
    <script src="{{asset('vendor/js/extensions/revolution.extension.parallax.min.js')}}"></script>
    <script src="{{asset('vendor/js/extensions/revolution.extension.slideanims.min.js')}}"></script>
    <script src="{{asset('vendor/js/extensions/revolution.extension.video.min.js')}}"></script>
    
    <!-- Custom Script -->
    <script src="{{asset('js/script.js')}}"></script>
    <script src="{{asset('js/ajax.js')}}"></script>
    <script>
        $(function () { 
            $('.orderby').change(function () { 
                $('#form_order').submit();
            });
            $('.display').change(function () { 
                $('#form_display').submit();
            });
        })
        $(document).ready(function() {
            $.ajax({
                type: "get",
                url: "https://provinces.open-api.vn/api/p/",
                data: "data",
                dataType: "json",
                success: function (response) {
                    response.forEach(item => {
                        $('select[name="province"]').append('<option value="'+ item.code +'">'+ item.name +'</option>');
                    });
                }
            });

            $('select[name="province"]').on('change', function() {
                var provinceID = $(this).val();
                $('input[name="province"]').val($('#province option:selected').text());
                if(provinceID) {
                    $.ajax({
                        url: 'https://provinces.open-api.vn/api/p/'+ provinceID +'?depth=2',
                        type: "GET",
                        dataType: "json",
                        success:function(response) {
                            $('select[name="district"]').empty();
                            $('select[name="ward"]').empty();
                            response.districts.forEach(item => {
                                $('select[name="district"]').append('<option value="'+ item.code +'">'+ item.name +'</option>');
                            });
                        }
                    });
                }else{
                    $('select[name="district"]').empty();
                }
            });

            $('select[name="district"]').on('change', function() {
                var districtID = $(this).val();
                $('input[name="district"]').val($('#district option:selected').text());
                if(districtID) {
                    $.ajax({
                        url: 'https://provinces.open-api.vn/api/d/'+districtID+'?depth=2',
                        type: "GET",
                        dataType: "json",
                        success:function(response) {
                            $('select[name="ward"]').empty();
                            response.wards.forEach(item => {
                                $('select[name="ward"]').append('<option value="'+ item.code +'">'+ item.name +'</option>');
                            });
                        }
                    });
                }else{
                    $('select[name="ward"]').empty();
                }
            });

            $('select[name="ward"]').on('change', function() {
                $('input[name="ward"]').val($('#ward option:selected').text());
            });

        });
    </script>
</body>
</html>