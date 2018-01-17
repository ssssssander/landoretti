<?php

Breadcrumbs::register('home', function ($breadcrumbs) {
    $breadcrumbs->push(trans('home.home'), route('home'));
});

Breadcrumbs::register('art', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push(trans('art.art'), route('art'));
});

Breadcrumbs::register('auctionDetail', function ($breadcrumbs, $auction) {
    $breadcrumbs->parent('art');
    $breadcrumbs->push($auction->title, route('auctionDetail', ['auction' => $auction, 'title' => clean($auction->title)]));
});


Breadcrumbs::register('iSearch', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push(trans('isearch.isearch'), route('iSearch'));
});

Breadcrumbs::register('register', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push(trans('register.register'), route('register'));
});

Breadcrumbs::register('password.request', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push(trans('header.forgot_password'), route('password.request'));
});

Breadcrumbs::register('password.reset', function ($breadcrumbs, $token) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push(trans('passwords.reset_password'), route('password.reset', ['token' => $token]));
});

Breadcrumbs::register('profile', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push(Auth::user()->name, route('profile'));
});

Breadcrumbs::register('watchlist', function ($breadcrumbs) {
    $breadcrumbs->parent('profile');
    $breadcrumbs->push(trans('watchlist.watchlist'), route('watchlist'));
});

Breadcrumbs::register('myAuctions', function ($breadcrumbs) {
    $breadcrumbs->parent('profile');
    $breadcrumbs->push(trans('my_auctions.my_auctions'), route('myAuctions'));
});

Breadcrumbs::register('newAuction', function ($breadcrumbs) {
    $breadcrumbs->parent('myAuctions');
    $breadcrumbs->push(trans('new_auction.new_auction'), route('newAuction'));
});
