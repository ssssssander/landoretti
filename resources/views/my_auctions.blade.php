@extends('layouts.app')

@section('title', trans('my_auctions.my_auctions'))

@section('content')
    <div class="wrapper">
        <main>
            <a class="small-button" href="{{ route('newAuction') }}">@lang('my_auctions.add_auction')</a>
            <h1>@lang('my_auctions.my_auctions')</h1>
            <h2>@lang('my_auctions.active')</h2>
            @include('includes.auction_table', ['auctions' => $activeAuctions])
            <h2>@lang('my_auctions.expired')</h2>
            @include('includes.auction_table', ['auctions' => $expiredAuctions])
            <h2>@lang('my_auctions.sold')</h2>
            @include('includes.auction_table', ['auctions' => $soldAuctions])
        </main>
    </div>
@endsection
