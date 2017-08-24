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

Route::get('/division/index', 'DivisionController@index')->name('division.index');
Route::post('/division/store', 'DivisionController@store')->name('division.store');
Route::delete('/division/delete/{id}', 'DivisionController@delete')->name('division.delete');
Route::get('/division/subjects/edit/{id}', 'DivisionController@subjectsEdit')->name('division.subjects.edit');
Route::put('/division/subjects/edit/{id}', 'DivisionController@subjectsUpdate')->name('division.subjects.update');
Route::get('/division/students/edit/{id}', 'DivisionController@studentsEdit')->name('division.students.edit');
Route::put('/division/students/edit/{id}', 'DivisionController@studentsUpdate')->name('division.students.update');

Route::group(['prefix' => '/division/subjects'], function () {
    Route::get('/grades-edit/{division}/{subject}', 'DivisionController@gradesEdit')->name('division.subject.grades-edit');
    Route::post('/grades-edit/{subjectId}/{studentId}', 'DivisionController@gradeAdd')->name('division.subject.grade-add');
    Route::put('/grade-update/{grade}', 'DivisionController@gradeUpdate')->name('division.subject.grade-update');
    Route::delete('/grade-delete/{grade}', 'DivisionController@gradeDelete')->name('division.subject.grade-delete');
    Route::post('/grades-edit/{division}/{subject}/summary', 'DivisionController@generateCSV')->name('division.subject.generate-csv');
});

Route::get('/history', 'GradesHistoryController@index')->name('history.index');

Route::get('/grades', 'GradeController@index')->name('grades.index');
