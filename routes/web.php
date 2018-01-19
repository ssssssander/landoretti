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

Route::get('home', 'EtcController@redirectHome');
Route::get('login', 'EtcController@redirectHome');

Route::get('setlocale/{locale}', 'EtcController@setLocale')->name('setLocale');
Route::get('/', 'EtcController@home')->name('home');
Route::get('art', 'EtcController@art')->name('art');
Route::get('isearch', 'EtcController@isearch')->name('iSearch');
Route::get('auction/{auction}/{auctionTitle?}', 'AuctionController@auctionDetail')->name('auctionDetail');

Route::middleware(['auth'])->group(function() {
    Route::get('watchlist', 'WatchlistController@watchlist')->name('watchlist');
    Route::delete('watchlist/deleteselected', 'WatchlistController@deleteSelectedWatchlistAuctions')->name('deleteSelectedWatchlistAuctions');
    Route::delete('watchlist/clear', 'WatchlistController@clearWatchlist')->name('clearWatchlist');
    Route::get('profile', 'EtcController@profile')->name('profile');
    Route::get('myauctions', 'AuctionController@myAuctions')->name('myAuctions');
    Route::get('newauction', 'AuctionController@newAuction')->name('newAuction');
    Route::post('addauction', 'AuctionController@addAuction')->name('addAuction');
    Route::post('auction/{auction}/{auctionTitle?}/buyout', 'AuctionController@auctionBuyout')->name('auctionBuyout');
    Route::post('auction/{auction}/{auctionTitle?}/bid', 'AuctionController@addBid')->name('addBid');
    Route::post('auction/{auction}/{auctionTitle?}/addtowatchlist', 'WatchlistController@addAuctionToWatchlist')->name('addAuctionToWatchlist');
});

// Auth routes
Route::post('login', 'Auth\LoginController@login')->name('login');
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Password reset routes
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');
