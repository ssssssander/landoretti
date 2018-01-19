@if(Route::currentRouteName() == 'isearch') {!! $auctions->appends($request->except(['page']))->links() !!} @endif
<table class="auction-table">
    <tr>
        <th colspan="2">@lang('auction_table.auction_details')</th>
        <th>@lang('auction_table.estimated_price')</th>
        <th>@lang('auction_table.end_data')</th>
        <th>@lang('auction_table.remaining_time')</th>
    </tr>
    @forelse($auctions as $auction)
        <tr>
            <td class="image">
                @if(Route::currentRouteName() == 'watchlist')
                    {!! Form::checkbox("auctions[{$loop->index}]", $auction->id, '', ['id' => "auctions[{$loop->index}]"]) !!}
                    <label for="{{ "auctions[{$loop->index}]" }}"><span></span></label>
                @endif
                <a href="{{ route('auctionDetail', ['auction' => $auction, 'auctionTitle' => clean($auction->title)]) }}">
                    <img src="{{ staticImage($auction->artwork_image_path) }}" alt="{{ $auction->title }}">
                </a>
            </td>
            <td class="title">
                <a href="{{ route('auctionDetail', ['auction' => $auction, 'auctionTitle' => clean($auction->title)]) }}">{{ $auction->title }}</a>
                <p>{{ $auction->year }}, {{ $auction->artist }}</p>
            </td>
            <td class="price">€ {{ formatPrice($auction->min_price) }}</td>
            <td class="end-date">{{ formatDate($auction->end_date) }}</td>
            <td class="remaining-time" @if($auction->status == 'active') data-end-date="{{ $auction->end_date }}" @endif>
                @if($auction->status == 'expired') @lang('auction_table.expired') @endif
                @if($auction->status == 'sold') @lang('auction_table.sold') @endif
            </td>
        </tr>
    @empty
        <tr>
            <td class="empty" colspan="5">@lang('auction_table.no_auctions')</td>
        </tr>
    @endforelse
</table>
@if(Route::currentRouteName() == 'isearch') {!! $auctions->appends($request->except(['page']))->links() !!} @endif
