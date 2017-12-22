@extends('layouts.app')

@section('title', trans('header.home'))

@section('content')
    <img src="{{ asset('img/slideshow.png') }}" alt="Slideshow" class="slideshow">
    <div class="wrapper block info">
        <h2>@lang('home.how_does_it_work')</h2>
        <div>
            <img src="{{ asset('img/sign_up.png') }}" alt="@lang('home.sign_up')">
            <h3>@lang('home.sign_up')</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p>
        </div>
        <div>
            <img src="{{ asset('img/make_deals.png') }}" alt="@lang('home.make_deals')">
            <h3>@lang('home.make_deals')</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p>
        </div>
        <div>
            <img src="{{ asset('img/everyone_happy.png') }}" alt="@lang('home.everyone_happy')">
            <h3>@lang('home.everyone_happy')</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p>
        </div>
    </div>
    <div class="stretch-bg">
        <div class="wrapper block popular">
            <h2>@lang('home.most_popular')<span></span></h2>
            <div>
                <a href="#"><img src="{{ asset('img/popular1.png') }}" alt="Popular 1"></a>
                <a href="#"><img src="{{ asset('img/popular2.png') }}" alt="Popular 2"></a>
            </div>
            <a href="#"><img src="{{ asset('img/popular3.png') }}" alt="Popular 3"></a>
        </div>
    </div>
@endsection
