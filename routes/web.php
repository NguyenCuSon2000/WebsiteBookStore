<?php

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

// Route::get('/admin', 'AdminController@showImportantInfo')->middleware(['auth','role: admin']);
// Route::get('/home', 'HomeController@index')->name('home');

// ADMIN
// LOGIN
// Route::get('/login/index', 'Auth\LoginController@getLogin')->name('/login/index');
// Route::post('/', "Auth\LoginController@postLogin")->name('/register/index');

//REGISTER
// Route::get("/register/index", 'Admin\RegisterController@index')->name('/register/index');
// Route::post('/register', "Admin\RegisterController@register")->name('/register');
Auth::routes();
// LOGOUT
Route::get('/admin/index', 'Admin\HomeController@index')->name('/admin/index')->middleware(['auth','role:admin']);

// CATEGORY
Route::resource('/category', 'Admin\CategoryProductController');
Route::get('/search_category', 'Admin\CategoryProductController@search')->name('search_category');

// PRODUCT
Route::resource('/product', 'Admin\ProductsController');
Route::get('/search_product', 'Admin\ProductsController@search')->name('search_product');

// CUSTOMER
Route::resource('/customer', 'Admin\CustomersController');
Route::get('/search_customer', 'Admin\CustomersController@search')->name('search_customer');

// USERS
Route::resource('user', 'Admin\UsersController');
Route::get('/search_user', 'Admin\UsersController@search')->name('search_user');

// PICTURES
Route::resource('picture', 'Admin\PictureController');
Route::get('/search_picture', 'Admin\PictureController@search')->name('search_picture');

//ORDER
Route::resource('order', "Admin\OrdersController");
Route::get('/print_order/{checkout_code}', "Admin\OrdersController@print_order")->name("print_order");





//USER PAGE
Route::get('/', 'User\HomeController@index')->name('index');
Route::get('/search', 'User\HomeController@index')->name("search");
Route::get('/listproduct/{id?}', 'User\ProductController@index')->name('listproduct');
Route::get('/product_detail/{id?}', 'User\ProductDetailController@index')->name('product_detail');


// SHOPPING CART
Route::resource('cart', "User\CartController");
Route::get('addcart/{id}', "User\CartController@addCart")->name("addcart");

//CHECK OUT
Route::get('checkout', "User\CheckoutController@getFormPay")->middleware('checklogin')->name("checkout");
Route::get('checkout_success', "User\CheckoutController@success")->name("checkout_success");
Route::post('checkout', "User\CheckoutController@postFormPay")->name("checkout");

// CONTACT
Route::get('/contact', "User\ContactController@index")->name("contact");
Route::post('/contact', "User\ContactController@saveContact")->name("contact");


//SEND MAIL
// Route::get("/send-mail","User\HomeController@send_mail");






