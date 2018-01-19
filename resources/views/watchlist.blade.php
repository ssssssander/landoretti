@extends('layouts.main')

@section('title', trans('watchlist.watchlist'))

@section('content')
    <div id="watchlist-categories">
        {!! Form::open(['route' => 'clearWatchlist', 'method' => 'delete']) !!}
        {!! Form::submit(trans('watchlist.clear_watchlist'), ['class' => 'small-button']) !!}
        {!! Form::close() !!}
        {!! Form::open(['route' => 'deleteSelectedWatchlistAuctions', 'method' => 'delete']) !!}
        {!! Form::submit(trans('watchlist.delete_selected'), ['class' => 'small-button']) !!}
        <h1>@lang('watchlist.watchlist')</h1>
        <p class="watchlist-categories">
            <a href="#" v-on:click.prevent="showCategory('all')" v-bind:class="{ active: shownCategory == 'all' }">@lang('watchlist.all')({{ count($watchlistAuctions) }})</a>
            <a href="#" v-on:click.prevent="showCategory('active')" v-bind:class="{ active: shownCategory == 'active' }">@lang('watchlist.active')({{ count($activeWatchlistAuctions) }})</a>
            <a href="#" v-on:click.prevent="showCategory('expired')" v-bind:class="{ active: shownCategory == 'expired' }">@lang('watchlist.expired')({{ count($expiredWatchlistAuctions) }})</a>
            <a href="#" v-on:click.prevent="showCategory('sold')" v-bind:class="{ active: shownCategory == 'sold' }">@lang('watchlist.sold')({{ count($soldWatchlistAuctions) }})</a>
        </p>
        <div v-if="shownCategory == 'all'">
            @include('partials.auction_table', ['auctions' => $watchlistAuctions])
        </div>
        <div v-if="shownCategory == 'active'">
            @include('partials.auction_table', ['auctions' => $activeWatchlistAuctions])
        </div>
        <div v-if="shownCategory == 'expired'">
            @include('partials.auction_table', ['auctions' => $expiredWatchlistAuctions])
        </div>
        <div v-if="shownCategory == 'sold'">
            @include('partials.auction_table', ['auctions' => $soldWatchlistAuctions])
        </div>
        {!! Form::close() !!}
    </div>
    @include('partials.scripts.remaining_time')
@endsection
