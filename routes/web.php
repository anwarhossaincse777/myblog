<?php

use Illuminate\Support\Facades\Route;


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/', function (){

    return view('website.home');
})->name('website');

Route::get('/contact', function (){

    return view('website.contact');
});
Route::get('/category', function (){

    return view('website.category');
});

Route::get('/post', function (){

    return view('website.post');
});

Route::get('/about', function (){

    return view('website.about');
});

Route::get('/tag', function (){

    return view('website.tag');
});



// Admin Panel Routes

Route::group(['prefix'=>'admin', 'middleware' => ['auth']], function () {
    Route::get('/dashboard','DashboardController@index')->name('dashboard');

    Route::resource('category', 'CategoryController');



    //Route for tag

    Route::resource('tag', 'TagController');


});


