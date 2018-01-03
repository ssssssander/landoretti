@extends('layouts.app')

@section('title', trans('home.home'))

@section('content')
    <img src="{{ asset('img/slideshow_home.png') }}" alt="Slideshow" class="slideshow-home">
    <div class="info">
        <h2>@lang('home.how_does_it_work')</h2>
        @foreach(trans('home.explanations') as $key => $explanation)
            <div>
                <img src="{{ asset("img/{$key}.png") }}" alt="{{ $explanation }}">
                <h3>{{ $explanation }}</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p>
            </div>
        @endforeach
    </div>
    <div class="stretch-bg">
        <div class="popular">
            <h2>@lang('home.most_popular')<span></span></h2>
            <div>
                <a href="#"><img src="{{ asset('img/popular1.png') }}" alt="Popular 1"></a>
                <a href="#"><img src="{{ asset('img/popular2.png') }}" alt="Popular 2"></a>
            </div>
            <a href="#"><img src="{{ asset('img/popular3.png') }}" alt="Popular 3"></a>
        </div>
    </div>
@endsection
