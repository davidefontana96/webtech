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

// proviamo con una laravel api daje
Route::get('/provemose', function(){
  return response()->json([
    'name' => 'Abigail',
    'state' => 'CA'
]);
});


Route::get('/checkout', 'checkoutController@initializePage')->middleware('verified');

Route::post('/ordercomplete', 'checkoutController@orderComplete')->middleware('verified');

Route::get('/wishlist', function () {
    return view('wishlistview');
});

Route::get('/cart', 'cartController@ShowProductInCart')->middleware('verified');

Route::get('/cart/couponapply', 'cartController@applyCoupon')->middleware('verified');

Route::get('/cart/removeproduct', 'cartController@removeProduct')->middleware('verified');

Route::get('/contact', function () {
    return view('contact');
});
Route::get('/about', function () {
    return view('about');
});

Route::get('/history', 'pastOrdersController@initializePage');

Route::get('/index2', 'IndexController@initializePage2');

Route::get('/index2/fetchData', 'IndexController@initializePage2');

Route::get('/filterFunction', 'IndexController@indexFilter');

Route::post('/autocomplete','IndexController@autocomplete'); //Instead of Theme your Controller name

Route::get('wishlist', 'wishlistController@initializePage')->middleware('verified');

Route::get('/wishlist/remove', 'wishlistController@removeWish')->middleware('verified');


Auth::routes();

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/profile', '\App\Http\Controllers\Auth\LoginController@profile');

$this->get('/verify-user/{code}', 'Auth\RegisterController@activateUser')->name('activate.user');

Route::post('/insertM', 'messageController@sendMessage');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
