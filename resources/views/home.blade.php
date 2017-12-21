@extends('layouts.app')

@section('title', trans('header.home'))

@section('content')
    <img src="{{ asset('img/slideshow.png') }}" alt="Slideshow" class="slideshow">
    <div class="wrapper block info">
        <h2>How does it work?</h2>
    </div>
@endsection
