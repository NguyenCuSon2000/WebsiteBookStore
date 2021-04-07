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
// Auth::routes();
// Route::get('/home', 'HomeController@index')->name('home');

// ADMIN
Route::get('/login/index', 'Admin\LoginController@index')->name('/login/index');
Route::post('/login', "Admin\LoginController@login")->name('/login');
Route::get('/logout', "Admin\LoginController@logout")->name('/logout');
Route::get('/admin/index', 'Admin\HomeController@index')->name('/admin/index');

Route::resource('/category', 'Admin\CategoryProductController');
Route::get('/search', 'Admin\CategoryProductController@search')->name('search');
Route::resource('/product', 'Admin\ProductsController');
Route::get('/search', 'Admin\ProductsController@search')->name('search');



//USER PAGE
Route::get('/', 'User\HomeController@index')->name('home');



