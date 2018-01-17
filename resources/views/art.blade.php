@extends('layouts.main')

@section('title', trans('art.art'))

@section('content')
    @include('partials.auction_cards', ['auctions' => $auctions])
@endsection
