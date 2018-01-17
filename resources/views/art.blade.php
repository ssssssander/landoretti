@extends('layouts.main')

@section('title', trans('art.art'))

@section('content')
    <h1>@lang('art.art')</h1>
    @include('partials.auction_cards', ['auctions' => $auctions])
@endsection
