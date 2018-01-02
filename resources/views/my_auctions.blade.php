@extends('layouts.app')

@section('title', trans('my_auctions.my_auctions'))

@section('content')
    <div class="wrapper">
        <main>
            <h1>@lang('my_auctions.my_auctions')</h1>
            <a class="button" href="{{ route('newAuction') }}">@lang('my_auctions.add_auction')</a>
            <table class="my-auctions">
                <tr>
                    <th colspan="2">@lang('my_auctions.auction_details')</th>
                    <th>@lang('my_auctions.estimated_price')</th>
                    <th>@lang('my_auctions.end_data')</th>
                    <th>@lang('my_auctions.remaining_time')</th>
                </tr>
                @foreach(Auth::user()->auctions as $auction)
                    <tr>
                        <td class="image">
                            <img src="{{ asset("storage/{$auction->artwork_image_path}") }}" alt="{{ $auction->title }}">
                        </td>
                        <td class="title">
                            <a href="#">{{ $auction->title }}</a>
                            <p>{{ $auction->year }}</p>
                        </td>
                        <td class="price">€ {{ number_format($auction->min_price, 0, '', '.') }}</td>
                        <td class="end-date">{{ date('F d, Y H:i a (T)', strtotime($auction->end_date)) }}</td>
                        <td class="remaining-time" data-end-date="{{ $auction->end_date }}"></td>
                    </tr>
                @endforeach
            </table>
        </main>
    </div>
    <script>
        let remainingTimeElems = document.getElementsByClassName('remaining-time');

        for(let i = 0; i < remainingTimeElems.length; i++) {
            let countDownDate = new Date(remainingTimeElems[i].getAttribute('data-end-date')).getTime();
            let now = new Date().getTime();
            let distance = countDownDate - now;

            let days = Math.floor(distance / (1000 * 60 * 60 * 24));
            let hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            let minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));

            remainingTimeElems[i].innerHTML = days + 'd ' + hours + 'h ' + minutes + 'm ';
        }
    </script>
@endsection
