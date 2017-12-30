@extends('layouts.app')

@section('title', trans('my_auctions.my_auctions'))

@section('content')
    <div class="wrapper">
        <main class="my-auctions">
            <h1>@lang('my_auctions.my_auctions')</h1>
            <a href="{{ route('newAuction') }}">@lang('my_auctions.add_auction')</a>
            @foreach(Auth::user()->auctions as $auction)
                <p>{{ $auction }}</p>
            @endforeach
        </main>
    </div>
@endsection
