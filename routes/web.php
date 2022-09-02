<?php
use \Illuminate\Support\Facades\URL;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
    //     return view('welcome');
    // });
    
    
    //----------------------------------------------     ADMIN PAGE    ----------------------------------------------------//
    
    Auth::routes();
    // LOGOUT
    // Route::middleware(['role'])->group(function () {
        
        // });
        
  Route::get('login_auth', 'Auth\AuthController@getFormLogin')->name('login_auth');
  Route::post('login_auth', 'Auth\AuthController@submitLogin')->name('login_auth');
  Route::get('logout', 'Auth\AuthController@logout')->name('logout');

  Route::group(['middleware' => ['auth','role']], function () {
      Route::get('/admin/index', 'Admin\HomeController@index')->name('/admin/index');
      
      // CATEGORY
      Route::resource('/category', 'Admin\CategoryProductController');
      Route::get('/search_category', 'Admin\CategoryProductController@search')->name('search_category');
      
      // PRODUCT
      Route::resource('/product', 'Admin\ProductsController');
      Route::get('/search_product', 'Admin\ProductsController@search')->name('search_product');
      Route::get('export_products', 'Admin\ProductsController@export')->name('export_products');
      Route::post('import_products', 'Admin\ProductsController@import')->name('import_products');
      
      // CUSTOMER
      Route::resource('/customer', 'Admin\CustomersController');
      Route::get('/search_customer', 'Admin\CustomersController@search')->name('search_customer');
      
      // USERS
      Route::resource('user', 'Admin\UsersController');
      Route::get('/search_user', 'Admin\UsersController@search')->name('search_user');
      
      // ROLES
      Route::resource('role', 'Admin\RolesController');
      Route::get('/search_role', 'Admin\RolesController@search')->name('search_role');
      
      // PICTURES
      Route::resource('picture', 'Admin\PictureController');
      Route::get('/search_picture', 'Admin\PictureController@search')->name('search_picture');
      
      //ORDER
      Route::resource('order', "Admin\OrdersController");
      Route::get('/search_order', 'Admin\OrdersController@search');
      Route::get('/getOrderCurrent', 'Admin\OrdersController@getOrderCurrent')->name('getOrderCurrent');
      Route::get('/getOrderDone', 'Admin\OrdersController@getOrderDone')->name('getOrderDone');
      Route::get('/getOrderWait', 'Admin\OrdersController@getOrderWait')->name('getOrderWait');
      Route::get('/print_order/{checkout_code}', "Admin\OrdersController@print_order")->name("print_order");
      
      
      //CONTACT
      Route::resource('contact_admin', 'Admin\ContactController');
      Route::get('/search_contact', 'Admin\ContactController@search')->name('search_contact');
      
      //STATISTICS
      Route::get('/statistic/index', 'Admin\StatisticsController@index')->name('/statistic/index');
      Route::get('/statistic/order_pay', 'Admin\StatisticsController@getOrder')->name("/statistic/order_pay");
      Route::get('/statistic/comment_count', 'Admin\StatisticsController@getComment')->name("/statistic/comment_count");
      Route::get('/statistic/order_highlight', 'Admin\StatisticsController@getOrderHighlight')->name("/statistic/order_highlight");
      Route::get('/statistic/order_time', 'Admin\StatisticsController@getOrderTime')->name("/statistic/order_time");
      Route::get('/statistic/order_quarter', 'Admin\StatisticsController@getOrderQuarter')->name("/statistic/order_quarter");
      Route::get('/statistic/order_count', 'Admin\StatisticsController@getOrderCount')->name("/statistic/order_count");
      Route::get('/statistic/order_list/{month}/{year}', 'Admin\StatisticsController@getListOrderTime')->name("/statistic/order_list");


      // THỐNG KÊ DẠNG BIỂU DỒ
      Route::get('/statistic/chart/revenue', 'Admin\StatisticsController@Revenue')->name('revenue');
      Route::post('/statistic/chart/filter_by_date', 'Admin\StatisticsController@filter_by_date')->name('filter_by_date');
      Route::post('/statistic/chart/filter_by_month_year', 'Admin\StatisticsController@filter_by_month_year')->name('filter_by_month_year');
      Route::post('/statistic/chart/filter_by_year', 'Admin\StatisticsController@filter_by_year')->name('filter_by_year');
      Route::post('/statistic/chart/get_revenue_filter_date', 'Admin\StatisticsController@getRevenueFilterDate')->name('get_revenue_filter_date');
      Route::post('/statistic/chart/get_revenue_today', 'Admin\StatisticsController@getRevenueToday')->name('get_revenue_today');
      Route::post('/statistic/chart/filter_by_quater', 'Admin\StatisticsController@filter_by_quater')->name('filter_by_quater');
      
      
      // COMMENT
      Route::resource('comment', 'Admin\CommentsController');
      Route::get('/search_comment', 'Admin\CommentsController@search')->name('search_comment');
      
      // DISCOUNT
      Route::resource('discount', 'Admin\DiscountController');
      Route::get('/search_discount', 'Admin\DiscountController@search')->name('search_discount');
      
      //NEWS
      Route::resource('news', 'Admin\NewsController');
      Route::get('/search_new', 'Admin\NewsController@search')->name('search_new');
      
      //Excel
      Route::get('export', 'MyController@export')->name('export');
      Route::get('importExportView', 'MyController@importExportView');
      Route::post('import', 'MyController@import')->name('import');
      
    
  });
    // LANGUAGE
    Route::get('/language/{language}','Admin\LanguageController@index')->name('language.index');
  // Route::get('/admin/index', 'Admin\HomeController@index')->name('/admin/index')->middleware(['auth','role']);


  //----------------------------------------------     USER PAGE    ----------------------------------------------------//

  Route::get('/', 'User\HomeController@index')->name('index');
  Route::get('/search', 'User\HomeController@index')->name("search");
  Route::get('/listproduct/{id?}', 'User\ProductController@index')->name('listproduct');
  Route::get('/product_detail/{id?}', 'User\ProductDetailController@index')->name('product_detail');

  // SHOPPING CART
  Route::resource('cart', "User\CartController");
  Route::get('addcart/{id?}', "User\CartController@addCart")->name("addcart");
  Route::put('updateAll', "User\CartController@updateAll")->name("updateAll");

  //CHECK OUT

  
Route::get('get-district-list/{province_id}','User\CheckoutController@getDistrictByProvince');
Route::get('get-ward-list/{district_id}','User\CheckoutController@getWardByDistrict');

  Route::get('get_login_order', "User\CheckoutController@get_login_order")->name("get_login_order");
  Route::post('login_order', "User\CheckoutController@login_order")->name("login_order");
  Route::get('logout_checkout', "User\CheckoutController@logout_checkout")->name("logout_checkout");

  // Route::get('history', "User\CheckoutController@history")->middleware(['auth','history:user'])->name("history");
  Route::get('history', "User\CheckoutController@history")->name("history");
  Route::get('history_order_detail/{id?}', "User\CheckoutController@history_order_detail")->name("history_order_detail");

  Route::get('checkout', "User\CheckoutController@getFormPay")->name("checkout");
  Route::get('checkout_success', "User\CheckoutController@success")->name("checkout_success");
  Route::post('checkout', "User\CheckoutController@postFormPay")->name("checkout");

  Route::post('vnpay_payment', "User\CheckoutController@vnpay_payment")->name("vnpay_payment");


  // CONTACT
  Route::get('/contact', "User\ContactController@index")->name("contact");
  Route::post('/contact', "User\ContactController@saveContact")->name("contact");

  // COMMENT 
  Route::post('/comment/{id?}', "User\ProductDetailController@saveComment")->name("comment");


  // NEWS
  Route::get("/new","User\NewsController@index")->name("new");
  Route::get("/new_detail/{id?}","User\NewsController@new_detail")->name("new_detail");

  //INTRODUCE
  Route::get("/introduce","User\IntroduceController@index")->name("introduce");

  //SEND MAIL
  // Route::get("/send-mail","User\HomeController@send_mail");

  // LOGIN FACEBOOK
  Route::get('/login-facebook','Auth\AuthController@login_facebook');
  Route::get('/facebook/callback','Auth\AuthController@callback_facebook');

  // LOGIN GOOGLE
  Route::get('/login-google','Auth\AuthController@login_google');
  Route::get('/google/callback','Auth\AuthController@callback_google');
  

  Auth::routes();

  Route::get('/home', 'HomeController@index')->name('home');

  Auth::routes();

  Route::get('/home', 'HomeController@index')->name('home');

  Auth::routes();

  Route::get('/home', 'HomeController@index')->name('home');

  Auth::routes();

  Route::get('/home', 'HomeController@index')->name('home');

  if(App::environment('production')){
    URL::forceScheme('https');
  }

