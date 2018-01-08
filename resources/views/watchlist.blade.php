@extends('layouts.app')

@section('title', trans('watchlist.watchlist'))

@section('content')
    <div class="wrapper">
        <main>
            <div id="watchlist-categories">
                {!! Form::open(['route' => 'clearWatchlist', 'method' => 'delete']) !!}
                {!! Form::submit(trans('watchlist.clear_watchlist'), ['class' => 'small-button']) !!}
                {!! Form::close() !!}
                {!! Form::open(['route' => 'deleteSelectedWatchlistAuctions', 'method' => 'delete']) !!}
                {!! Form::submit(trans('watchlist.delete_selected'), ['class' => 'small-button']) !!}
                <h1>@lang('watchlist.watchlist')</h1>
                <p class="watchlist-categories">
                    <a href="#" v-on:click.prevent="showAll" v-bind:class="{ active: allAreShown }">@lang('watchlist.all')({{ count($watchlistAuctions) }})</a>
                    <a href="#" v-on:click.prevent="showActive" v-bind:class="{ active: activeAreShown }">@lang('watchlist.active')({{ count($activeWatchlistAuctions) }})</a>
                    <a href="#" v-on:click.prevent="showExpired" v-bind:class="{ active: expiredAreShown }">@lang('watchlist.expired')({{ count($expiredWatchlistAuctions) }})</a>
                    <a href="#" v-on:click.prevent="showSold" v-bind:class="{ active: soldAreShown }">@lang('watchlist.sold')({{ count($soldWatchlistAuctions) }})</a>
                </p>
                <div v-if="allAreShown">
                    @include('includes.auction_table', ['auctions' => $watchlistAuctions, 'watchlist' => true])
                </div>
                <div v-if="activeAreShown">
                    @include('includes.auction_table', ['auctions' => $activeWatchlistAuctions, 'watchlist' => true])
                </div>
                <div v-if="expiredAreShown">
                    @include('includes.auction_table', ['auctions' => $expiredWatchlistAuctions, 'watchlist' => true])
                </div>
                <div v-if="soldAreShown">
                    @include('includes.auction_table', ['auctions' => $soldWatchlistAuctions, 'watchlist' => true])
                </div>
                {!! Form::close() !!}
            </div>
        </main>
    </div>
    @include('includes.scripts.remaining_time')
@endsection
