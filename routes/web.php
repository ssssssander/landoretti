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
Route::get('art', 'PageController@art')->name('art');
Route::get('isearch', 'PageController@isearch')->name('iSearch');
Route::get('auction/{auction}/{auctionTitle?}', 'PageController@auctionDetail')->name('auctionDetail');

Route::middleware(['auth'])->group(function() {
    Route::get('watchlist', 'PageController@watchlist')->name('watchlist');
    Route::delete('watchlist/deleteselected', 'PageController@deleteSelectedWatchlistAuctions')->name('deleteSelectedWatchlistAuctions');
    Route::delete('watchlist/clear', 'PageController@clearWatchlist')->name('clearWatchlist');
    Route::get('profile', 'PageController@profile')->name('profile');
    Route::get('myauctions', 'PageController@myAuctions')->name('myAuctions');
    Route::get('newauction', 'PageController@newAuction')->name('newAuction');
    Route::post('addauction', 'PageController@addAuction')->name('addAuction');
    Route::post('auction/{auction}/{auctionTitle?}/buyout', 'PageController@auctionBuyout')->name('auctionBuyout');
    Route::post('auction/{auction}/{auctionTitle?}/bid', 'PageController@addBid')->name('addBid');
    Route::post('auction/{auction}/{auctionTitle?}/addtowatchlist', 'PageController@addAuctionToWatchlist')->name('addAuctionToWatchlist');
});

// Auth routes
Route::post('login', 'Auth\LoginController@login')->name('login');
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
