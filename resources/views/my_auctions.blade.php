@extends('layouts.app')

@section('title', trans('my_auctions.my_auctions'))

@section('content')
    <div class="wrapper">
        <main>
            <a class="button" href="{{ route('newAuction') }}">@lang('my_auctions.add_auction')</a>
            <h1>@lang('my_auctions.my_auctions')</h1>
            <h2>@lang('my_auctions.active')</h2>
            <table class="my-auctions">
                <tr>
                    <th colspan="2">@lang('my_auctions.auction_details')</th>
                    <th>@lang('my_auctions.estimated_price')</th>
                    <th>@lang('my_auctions.end_data')</th>
                    <th>@lang('my_auctions.remaining_time')</th>
                </tr>
                @foreach(Auth::user()->auctions as $auction)
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
                @endforeach
            </table>
            <h2>@lang('my_auctions.expired')</h2>
            <h2>@lang('my_auctions.sold')</h2>
        </main>
    </div>
    @include('includes.scripts.remaining_time')
@endsection
