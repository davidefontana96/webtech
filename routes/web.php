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

Route::get('/', function () {
    return view('index');
});

Route::get('/index', 'IndexController@initializePage');

Route::get('/index/{search}', 'IndexController@searchBar');

Route::get('/women', function () {
    return view('women');
});

Route::get('/men', function () {
    return view('men');
});

Route::get('/cart', function () {
    return view('cart');
});

Route::get('/contact', function () {
    return view('contact');
});
Route::get('/about', function () {
    return view('about');
});

Route::get('/prod', function () {
    return view('product-detail');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

$this->get('/verify-user/{code}', 'Auth\RegisterController@activateUser')->name('activate.user');

Route::get('/prova', function () {
    return view('provalog');
});
