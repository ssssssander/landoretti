@extends('layouts.app')

@section('title', trans('art.art'))

@section('content')
    <div class="wrapper">
        <main>
            {!! $auctions->appends($request->except(['page']))->links() !!}
            <div class="auction-cards">
                @foreach($auctions as $auction)
                    <div class="auction-card">
                        <a href="{{ route('auctionDetail', ['auction' => $auction, 'auctionTitle' => clean($auction->title)]) }}">
                            <img src="{{ asset("storage/{$auction->artwork_image_path}") }}" alt="{{ $auction->title }}">
                        </a>
                        <div class="auction-info">
                            <div class="year">{{ $auction->year }}</div>
                            <div class="title">
                                <a href="{{ route('auctionDetail', ['auction' => $auction, 'auctionTitle' => clean($auction->title)]) }}">{{ $auction->title }}</a>
                            </div>
                            <div class="price">€ {{ formatPrice($auction->min_price) }}</div>
                            <span class="remaining-time" data-end-date="{{ $auction->end_date }}"></span>
                            <a href="{{ route('auctionDetail', ['auction' => $auction, 'auctionTitle' => clean($auction->title)]) }}" class="small-button">@lang('art.visit_auction')</a>
                        </div>
                    </div>
                @endforeach
            </div>
            {!! $auctions->appends($request->except(['page']))->links() !!}
        </main>
    </div>
    @include('includes.scripts.remaining_time')
@endsection
