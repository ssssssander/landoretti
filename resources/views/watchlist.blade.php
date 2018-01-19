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
            @for($i = 0; $i < count($watchlistAuctions); $i++)
                <a href="#" v-on:click.prevent="showCategory('{{ $watchlistStatuses[$i] }}')"
                v-bind:class="{ active: shownCategory == '{{ $watchlistStatuses[$i] }}' }">@lang("watchlist.{$watchlistStatuses[$i]}")({{ count($watchlistAuctions[$i]) }})</a>
            @endfor
        </p>
        @for($i = 0; $i < count($watchlistAuctions); $i++)
            <div v-if="shownCategory == '{{ $watchlistStatuses[$i] }}'">
                @include('partials.auction_table', ['auctions' => $watchlistAuctions[$i]])
            </div>
        @endfor
        {!! Form::close() !!}
    </div>
    @include('partials.scripts.remaining_time')
@endsection
