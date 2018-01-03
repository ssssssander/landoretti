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

Route::get('home', 'PageController@redirectHome');
Route::get('login', 'PageController@redirectHome');

Route::get('setlocale/{locale}', 'PageController@setLocale')->name('setLocale');
Route::get('/', 'PageController@home')->name('home');
Route::get('isearch', 'PageController@isearch')->name('isearch');

Route::middleware(['auth'])->group(function() {
    Route::get('profile', 'PageController@profile')->name('profile');
    Route::get('myauctions', 'PageController@myAuctions')->name('myAuctions');
    Route::get('newauction', 'PageController@newAuction')->name('newAuction');
    Route::post('addauction', 'PageController@addAuction')->name('addAuction');
    Route::get('auction/{auction}/{auctionTitle?}', 'PageController@auctionDetail')->name('auctionDetail');
});

// Auth routes
Route::post('login', 'Auth\LoginController@login')->name('login');
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
