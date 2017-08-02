<?php

Route::get('/', 'PostController@index')->name('home');
Route::get('/home', 'PostController@index');

Route::get('/login', 'SessionController@create');
Route::post('/login', 'SessionController@store');
Route::get('/logout', 'SessionController@destroy');

Route::get('/editprofile', 'ProfileController@view');
Route::post('/editprofile', 'ProfileController@changePassword');
