@extends('layouts.app')

@section('title', $auction->title)

@section('content')
    <div class="wrapper">
        <main class="auction-detail">
            <h1>{{ $auction->title }}</h1>
            <div>
                <span class="remaining-time" data-end-date="{{ $auction->end_date }}"></span>
                <span class="bids">({{ trans_choice('auction_detail.bids', 7, ['bids' => 7]) }})</span>
            </div>
            <div class="top">
                <img src="{{ asset('img/slideshow_detail.png') }}" alt="Slideshow">
            </div>
        </main>
    </div>
    @include('includes.scripts.remaining_time')
@endsection
