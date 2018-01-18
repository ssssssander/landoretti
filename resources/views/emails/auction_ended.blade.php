@component('mail::message')
# Dear {{ $userName }}

{{ $auctionTitle }} has ended.
The price of your latest bid was € {{ formatPrice($latestBidPrice)  }}.
@if($hasHighestBid)
You got the highest bid, congratulations on your purchase!
@else
You didn't get the highest bid, better luck next time.
@endif

@component('mail::button', ['url' => config('app.url')])
Visit the site
@endcomponent

Thank you,<br>
{{ config('app.name') }}
@endcomponent
