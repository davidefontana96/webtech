<?php

Route::get('/women', 'shoesController@womenShoes');

Route::get('brands/{id}/{sex}', 'shoesController@brandShoes');

Route::get('categories/{id}/{sex}', 'shoesController@categoryShoes');

Route::get('styles/{id}/{sex}', 'shoesController@styleShoes');

Route::get('/men', 'shoesController@menShoes');

Route::get('/{id}/product-detail', 'productDetailsController@detailShoe');

Route::get('/{id}/product-detail/{number}', 'productDetailsController@availability');

Route::get('/{id}/product-detail/{number}/addtocart', 'productDetailsController@addCart');

Route::get('/{id}/product-detail/{number}/reviewed', 'productDetailsController@review');

Route::get('/{id}/product-detail/{number}/removed', 'productDetailsController@removeFromCart');
