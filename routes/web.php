<?php

use Illuminate\Support\Facades\Route;


Auth::routes();

        Route::get('/home', 'HomeController@index')->name('home');



        //frontend routes

        Route::get('/', 'FrontendController@home')->name('homewebsite');
        Route::get('/contact', 'FrontendController@contact')->name('website.contact');
        Route::get('/category/{slug}', 'FrontendController@category')->name('website.category');
        Route::get('/post/{slug}', 'FrontendController@post')->name('website.post');
        Route::get('/about', 'FrontendController@about')->name('website.about');





// Admin Panel Routes

    Route::group(['prefix'=>'admin', 'middleware' => ['auth']], function () {
    Route::get('/dashboard','DashboardController@index')->name('dashboard');
    Route::resource('category', 'CategoryController');

    //Route for tag
    Route::resource('tag', 'TagController');
    //Route for posts
    Route::resource('post','PostController');


    //Route for users

        Route::resource('user','UserController');
        Route::get('/profile','UserController@profile')->name('user.profile');
        Route::post('/profile','UserController@profileUpdate')->name('user.profile.update');
        Route::post('/user','UserController@users')->name('user.admin');


});






