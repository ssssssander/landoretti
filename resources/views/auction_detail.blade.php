@extends('layouts.app')

@section('title', $auction->title)

@section('content')
    <div class="wrapper">
        <main class="auction-detail">
            <h1>{{ $auction->title }}</h1>
            <div>
                <span class="remaining-time" data-end-date="{{ $auction->end_date }}"></span>
                <a href="#">
                    <span class="bids">({{ trans_choice('auction_detail.bids', 7, ['bids' => 7]) }})</span>
                </a>
            </div>
            <div class="top">
                <img src="{{ asset("storage/{$auction->artwork_image_path}") }}" alt="{{ $auction->title }}">
                <div class="side">
                    <div class="border-bottom">
                        <h2>{{ $auction->title }}</h2>
                        <p>{{ $auction->year }}</p>
                    </div>
                    <div class="border-bottom">
                        <p>
                            <span class="remaining-time" data-end-date="{{ $auction->end_date }}"></span>
                            <span> @lang('auction_detail.left')</span>
                        </p>
                        <p>{{ formatDate($auction->end_date) }}</p>
                    </div>
                    <div>
                        <p>{{ $auction->origin }}</p>
                    </div>
                    <div class="bid">
                        <div class="padding">
                            <p>@lang('auction_detail.estimated_price')</p>
                            <p class="estimated-price">€ {{ formatPrice($auction->min_price) }} - € {{ formatPrice($auction->max_price) }}</p>
                            @if($auction->buyout_price)
                                {!! Form::open(['route' => ['auctionBuyout', 'auction' => $auction, 'auctionTitle' => clean($auction->title)]]) !!}
                                {!! Form::submit(trans('auction_detail.buy_now', ['buyout_price' => formatPrice($auction->buyout_price)]), ['class' => 'buyout']) !!}
                                {!! Form::close() !!}
                            @endif
                            <span>{{ trans_choice('auction_detail.bids', 7, ['bids' => 7]) }}</span>
                        </div>
                        {!! Form::open(['route' => ['addBid', 'auction' => $auction, 'auctionTitle' => clean($auction->title)], 'class' => 'bid-form']) !!}
                        {!! Form::number('price', '', ['class' => 'price-input']) !!}
                        {!! Form::submit(trans('auction_detail.bid_now'), ['class' => 'price-submit']) !!}
                        {!! Form::close() !!}
                        {!! Form::open(['route' => ['addAuctionToWatchlist', 'auction' => $auction, 'auctionTitle' => clean($auction->title)], 'class' => 'add-to-watchlist-form']) !!}
                        {!! Form::submit(trans('auction_detail.add_to_watchlist'), ['class' => 'add-to-watchlist']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
            <div class="bottom">
                <div class="auction-texts">
                    <h3>@lang('auction_detail.description')</h3>
                    <p>{{ $auction->description }}</p>
                    <h3>@lang('auction_detail.condition')</h3>
                    <p>{{ $auction->condition }}</p>
                </div>
                <div class="auction-extra">
                    <h3>@lang('auction_detail.dimensions')</h3>
                    <p>{{ $auction->width }} x {{ $auction->height }} {{ $auction->depth ? 'x ' . $auction->depth : '' }} cm</p>
                </div>
            </div>
        </main>
    </div>
    @include('includes.scripts.remaining_time')
@endsection
