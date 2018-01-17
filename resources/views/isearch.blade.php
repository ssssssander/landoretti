@extends('layouts.main')

@section('title', trans('isearch.isearch'))

@section('content')
    <div class="isearch">
        <h1>@lang('isearch.isearch')</h1>
        @include('partials.search')
        <h2>@lang('isearch.overview')</h2>
        @include('partials.auction_table', ['auctions' => $searchResults])
    </div>
    @include('partials.scripts.remaining_time')
@endsection
