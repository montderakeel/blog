<?php

use App\Post;
use App\Http\Resources\PostCollection;

Route::get('/posts', function () {
    return new PostCollection(Post::all());
});


Route::get('/', 'FrontController@index');
Route::get('/category', 'FrontController@allCAtegory');
Route::get('/category/{id}', 'FrontController@category')->name('frontend.category');


Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'], function () {
    Route::get('/', function () {
        return view('home');
    })->name('root');
    Route::resource('post', 'PostController');
    Route::resource('category', 'CategoryController');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
