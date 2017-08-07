<?php

Route::get('/', 'PostController@index')->name('home');
Route::get('/home', 'PostController@index');

Route::get('/login', 'SessionController@create')->name('login');
Route::post('/login', 'SessionController@store');
Route::get('/logout', 'SessionController@destroy')->name('logout');

Route::get('/profile', 'ProfileController@index')->name('profile');
Route::post('/profile', 'ProfileController@update');
Route::get('/profile/create', 'ProfileController@create')->name('profile.create');
Route::post('/profile/create', 'ProfileController@store');
Route::get('/profile/confirm/{token}', 'ProfileController@setPassword')->name('profile.setPassword');
Route::post('/profile/confirm/{token}', 'ProfileController@confirm')->name('profile.confirm');

Route::get('/subject/create', 'SubjectController@create')->name('subject.create');
Route::post('/subject/create', 'SubjectController@store');
Route::delete('/subject/delete/{id}', 'SubjectController@delete')->name('subject.delete');

Route::get('/division/create', 'DivisionController@create')->name('division.create');
Route::post('/division/create', 'DivisionController@store');
Route::delete('/division/delete/{id}', 'DivisionController@delete')->name('division.delete');
Route::get('/division/edit/{id}', 'DivisionController@edit')->name('division.edit');
Route::post('/division/edit/{id}', 'DivisionController@update')->name('division.update');
