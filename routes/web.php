<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('en')->group(function() {
    Route::get('/', 'PageController@home')->name('/');
    Route::get('art', 'PageController@art')->name('art');
    Route::get('isearch', 'PageController@isearch')->name('isearch');
    Route::get('myauctions', 'PageController@myauctions')->name('myauctions');
    Route::get('mybids', 'PageController@mybids')->name('mybids');
    Route::get('contact', 'PageController@contact')->name('contact');
    // More...
});

Auth::routes();
