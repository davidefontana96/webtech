<?php

Route::get('/', 'newsController@getIndexNews');

Route::get('/detail/{id}', 'newsController@getNews');
