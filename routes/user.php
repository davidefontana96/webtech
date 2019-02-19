<?php


Route::get('/profile', 'userController@profile')->middleware('verified');


Route::post('/modify', 'userController@modify');

Route::post('/image', 'userController@modifyImage');
