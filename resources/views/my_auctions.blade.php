@extends('layouts.app')

@section('title', trans('my_auctions.my_auctions'))

@section('content')
    <div class="wrapper">
        <main>
            <h1>@lang('my_auctions.my_auctions')</h1>
            <a class="button" href="{{ route('newAuction') }}">@lang('my_auctions.add_auction')</a>
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
                            <a href="{{ route('auctionDetail',['auction' => $auction, 'auctionTitle' => preg_replace('/[^a-zA-Z0-9]+/', '-', $auction->title)]) }}">
                                <img src="{{ asset("storage/{$auction->artwork_image_path}") }}" alt="{{ $auction->title }}">
                            </a>
                        </td>
                        <td class="title">
                            <a href="{{ route('auctionDetail',['auction' => $auction, 'auctionTitle' => preg_replace('/[^a-zA-Z0-9]+/', '-', $auction->title)]) }}">{{ $auction->title }}</a>
                            <p>{{ $auction->year }}, {{ $auction->origin }}</p>
                        </td>
                        <td class="price">€ {{ number_format($auction->min_price, 0, '', '.') }}</td>
                        <td class="end-date">{{ date('F d, Y H:i a (T)', strtotime($auction->end_date)) }}</td>
                        <td class="remaining-time" data-end-date="{{ $auction->end_date }}"></td>
                    </tr>
                @endforeach
            </table>
        </main>
    </div>
    @include('includes.scripts.remaining_time')
@endsection
