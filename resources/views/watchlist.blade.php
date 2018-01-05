@extends('layouts.app')

@section('title', trans('watchlist.watchlist'))

@section('content')
    <div class="wrapper">
        <main>
            <a class="small-button" href="#">@lang('watchlist.delete_selected')</a>
            <a class="small-button" href="#">@lang('watchlist.clear_watchlist')</a>
            <h1>@lang('watchlist.watchlist')</h1>
            <p class="watchlist-categories">
                <a href="#" class="active">@lang('watchlist.all')()</a>
                <a href="#">@lang('watchlist.active')()</a>
                <a href="#">@lang('watchlist.expired')()</a>
            </p>
            <table class="auction-list">
                <tr>
                    <th colspan="2">@lang('my_auctions.auction_details')</th>
                    <th>@lang('my_auctions.estimated_price')</th>
                    <th>@lang('my_auctions.end_data')</th>
                    <th>@lang('my_auctions.remaining_time')</th>
                </tr>
                @forelse(Auth::user()->watchlist as $auction)
                    <tr>
                        <td class="image">
                            <a href="{{ route('auctionDetail', ['auction' => $auction, 'auctionTitle' => clean($auction->title)]) }}">
                                <img src="{{ asset("storage/{$auction->artwork_image_path}") }}" alt="{{ $auction->title }}">
                            </a>
                        </td>
                        <td class="title">
                            <a href="{{ route('auctionDetail', ['auction' => $auction, 'auctionTitle' => clean($auction->title)]) }}">{{ $auction->title }}</a>
                            <p>{{ $auction->year }}</p>
                        </td>
                        <td class="price">€ {{ formatPrice($auction->min_price) }}</td>
                        <td class="end-date">{{ formatDate($auction->end_date) }}</td>
                        <td class="remaining-time" data-end-date="{{ $auction->end_date }}"></td>
                    </tr>
                @empty
                    <tr>
                        <td>@lang('watchlist.no_auctions')</td>
                    </tr>
                @endforelse
            </table>
        </main>
    </div>
    @include('includes.scripts.remaining_time')
@endsection
