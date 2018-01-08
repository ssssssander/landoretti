<table class="auction-table">
    <tr>
        <th colspan="2">@lang('my_auctions.auction_details')</th>
        <th>@lang('my_auctions.estimated_price')</th>
        <th>@lang('my_auctions.end_data')</th>
        <th>@lang('my_auctions.remaining_time')</th>
    </tr>
    @forelse($auctions as $auction)
        <tr>
            <td class="image">
                @isset($watchlist) {!! Form::checkbox("auctions[{$loop->index}]", $auction->id) !!} @endisset
                <a href="{{ route('auctionDetail', ['auction' => $auction, 'auctionTitle' => clean($auction->title)]) }}">
                    <img src="{{ asset("storage/{$auction->artwork_image_path}") }}" alt="{{ $auction->title }}">
                </a>
            </td>
            <td class="title">
                <a href="{{ route('auctionDetail', ['auction' => $auction, 'auctionTitle' => clean($auction->title)]) }}">{{ $auction->title }}</a>
                <p>{{ $auction->year }}</p>
            </td>
            <td class="price">€ {{ formatPrice($auction->min_price) }}</td>
            @if($auction->status == 'active')
                <td class="end-date">{{ formatDate($auction->end_date) }}</td>
                <td class="remaining-time" data-end-date="{{ $auction->end_date }}"></td>
            @endif
        </tr>
    @empty
        <tr>
            <td class="none" colspan="5">@lang('my_auctions.no_auctions')</td>
        </tr>
    @endforelse
</table>
@include('includes.scripts.remaining_time')
