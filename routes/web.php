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

Route::get('/cart', function () {
    return view('cart');
})->middleware('verified');

Route::get('/contact', function () {
    return view('contact');
});

Auth::routes();

Route::get('/provaMail', function(){
  \Mail::to("davidefontana96.df@gmail.com")->send(new App\Mail\Registration());
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

$this->get('/verify-user/{code}', 'Auth\RegisterController@activateUser')->name('activate.user');

Route::get('/prova', 'IndexController@initializePage');
