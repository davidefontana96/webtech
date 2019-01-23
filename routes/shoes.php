<?php

Route::get('/women', 'shoesController@womenShoes');

Route::get('brands/{id}/{sex}', 'shoesController@brandShoes');

Route::get('categories/{id}/{sex}', 'shoesController@categoryShoes');

Route::get('styles/{id}/{sex}', 'shoesController@styleShoes');

Route::get('/men', 'shoesController@menShoes');

Route::get('/{nome}', 'shoesController@details');
