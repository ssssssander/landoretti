@extends('layouts.app')

@section('title', trans('isearch.isearch'))

@section('content')
<div class="wrapper">
    <main class="isearch">
        <h1>{{ trans('isearch.isearch') }}</h1>
        <h2>{{ trans('isearch.overview') }}</h2>
        @include('includes.auction_table', ['auctions' => $searchResults])
    </main>
</div>
@endsection
