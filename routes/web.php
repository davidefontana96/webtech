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



Route::get('/index', 'IndexController@initializePage');

/*Route::get('/index/{search}', 'IndexController@searchBar');*/

Route::get('/checkout', function () {
    return view('checkout');
});

Route::get('/cart', 'cartController@ShowProductInCart')->middleware('verified');

Route::get('/cart/couponapply', 'cartController@applyCoupon')->middleware('verified');

Route::get('/cart/removeproduct', 'cartController@removeproduct')->middleware('verified');

Route::get('/contact', function () {
    return view('contact');
});
Route::get('/about', function () {
    return view('about');
});

Route::get('/prod', function () {
    return view('product-detail');
});

Route::get('/index2', 'IndexController@initializePage2');

Route::get('/index2/fetchData', 'IndexController@initializePage2');

Route::get('/filterFunction', 'IndexController@indexFilter');

Auth::routes();

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/profile', '\App\Http\Controllers\Auth\LoginController@profile');

$this->get('/verify-user/{code}', 'Auth\RegisterController@activateUser')->name('activate.user');

Route::get('/prova', 'IndexController@initializePage');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
