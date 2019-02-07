<?php

Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'], function () {
    Route::get('/', function () {
        return view('home');
    })->name('root');
    Route::resource('post', 'PostController');
    Route::resource('category', 'CategoryController');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');