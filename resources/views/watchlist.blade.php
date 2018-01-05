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
                @if(count($watchlistAuctions) > 0)
                    @for($i = 0; $i < count($watchlistAuctions); $i++)
                        <tr>
                            <td class="image">
                                <a href="{{ route('auctionDetail', ['auction' => $watchlistAuctions[$i]->auction_id, 'auctionTitle' => clean($watchlistAuctions[$i]->title)]) }}">
                                    <img src="{{ asset("storage/{$watchlistAuctions[$i]->artwork_image_path}") }}" alt="{{ $watchlistAuctions[$i]->title }}">
                                </a>
                            </td>
                            <td class="title">
                                <a href="{{ route('auctionDetail', ['auction' => $watchlistAuctions[$i]->auction_id, 'auctionTitle' => clean($watchlistAuctions[$i]->title)]) }}">{{ $watchlistAuctions[$i]->title }}</a>
                                <p>{{ $watchlistAuctions[$i]->year }}</p>
                            </td>
                            <td class="price">€ {{ formatPrice($watchlistAuctions[$i]->min_price) }}</td>
                            <td class="end-date">{{ formatDate($watchlistAuctions[$i]->end_date) }}</td>
                            <td class="remaining-time" data-end-date="{{ $watchlistAuctions[$i]->end_date }}"></td>
                        </tr>
                    @endfor
                @else
                    <tr>
                        <td>@lang('watchlist.no_auctions')</td>
                    </tr>
                @endif
            </table>
        </main>
    </div>
    @include('includes.scripts.remaining_time')
@endsection
