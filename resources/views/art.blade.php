@extends('layouts.main')

@section('title', trans('art.art'))

@section('content')
    @include('includes.auction_cards', ['auctions' => $auctions])
@endsection
