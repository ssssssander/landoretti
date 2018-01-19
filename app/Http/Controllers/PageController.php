<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AddAuction;
use App\Http\Requests\AddBid;
use App\Auction;
use App\Bid;
use App\WatchlistItem;
use Carbon\Carbon;
use Auth;
use Image;

class PageController extends Controller
{
    public function home(Request $request) {
        return view('home');
    }

    public function art(Request $request) {
        $paginate = 12;
        $endingSoonest = Auction::where('status', 'active')->orderBy('end_date')->paginate($paginate);
        $endingLatest = Auction::where('status', 'active')->orderByDesc('end_date')->paginate($paginate);
        $new = Auction::where('status', 'active')->orderByDesc('created_at')->paginate($paginate);
        $popular = Auction::withCount('bids')->where('status', 'active')->orderByDesc('bids_count')->paginate($paginate);

        $orderedAuctions = [$endingSoonest, $endingLatest, $new, $popular];
        $orderedAuctionTypes = ['ending_soonest', 'ending_latest', 'new', 'popular'];

        return view('art', compact('request', 'orderedAuctions', 'orderedAuctionTypes'));
    }

    public function watchlist(Request $request) {
        $allWatchlistAuctions = WatchlistItem
            ::join('users', function($join) {
                $join->on('watchlist_items.user_id', 'users.id')
                ->where('watchlist_items.user_id', Auth::id());
            })
            ->join('auctions', 'watchlist_items.auction_id', 'auctions.id')->get();

        $activeWatchlistAuctions = $allWatchlistAuctions->where('status', 'active');
        $expiredWatchlistAuctions = $allWatchlistAuctions->where('status', 'expired');
        $soldWatchlistAuctions = $allWatchlistAuctions->where('status', 'sold');

        $watchlistAuctions = [$allWatchlistAuctions, $activeWatchlistAuctions, $expiredWatchlistAuctions, $soldWatchlistAuctions];
        $watchlistCategories = ['all', 'active', 'expired', 'sold'];

        return view('watchlist', compact('watchlistAuctions', 'watchlistCategories'));
    }

    public function deleteSelectedWatchlistAuctions(Request $request) {
        $auctionIds = $request->input('auctions.*');

        for($i = 0; $i < count($auctionIds); $i++) {
            if($this->getWatchlistAuctionInfo($auctionIds[$i])['isInWatchlist']) {
                $this->getWatchlistAuctionInfo($auctionIds[$i])['watchlistAuction']->delete();
            }
        }

        return redirect()->back();
    }

    public function clearWatchlist(Request $request) {
        WatchlistItem::where('user_id', Auth::id())->delete();

        return redirect()->back();
    }

    public function profile(Request $request) {
        $user = Auth::user();

        return view('profile', compact('user'));
    }

    public function iSearch(Request $request) {
        $query = $request->input('query');
        $searchResults = Auction::where([['title', 'like', "%{$query}%"], ['status', 'active']])->paginate(8);

        return view('isearch', compact('searchResults'));
    }

    public function myAuctions(Request $request) {
        $activeAuctions = Auth::user()->auctions->where('status', 'active');
        $expiredAuctions = Auth::user()->auctions->where('status', 'expired');
        $soldAuctions = Auth::user()->auctions->where('status', 'sold');

        return view('my_auctions', compact('activeAuctions', 'expiredAuctions', 'soldAuctions'));
    }

    public function newAuction(Request $request) {
        return view('new_auction');
    }

    public function addAuction(AddAuction $request) {
        $optionalImagePath = null;
        $endDate = Carbon::createFromFormat('d/m/y', $request->end_date);
        $formattedEndDate = $endDate->format('Y-m-d');
        $imageQuality = 60;

        if($request->artwork_image->isValid() && $request->signature_image->isValid()) {
            $artworkImagePath = 'storage/uploads/artwork_images/' . $request->artwork_image->hashName();
            $signatureImagePath = 'storage/uploads/signature_images/' . $request->signature_image->hashName();

            Image::make($request->artwork_image)->save($artworkImagePath, $imageQuality);
            Image::make($request->signature_image)->save($signatureImagePath, $imageQuality);
        }
        else {
            return redirect()->back();
        }


        if($request->optional_image && $request->optional_image->isValid()) {
            $optionalImagePath = 'storage/uploads/optional_images/' . $request->optional_image->hashName();

            Image::make($request->optional_image)->save($optionalImagePath, $imageQuality);
        }

        Auction::create([
            'user_id' => Auth::id(),
            'style' => $request->style,
            'title' => $request->title,
            'year' => $request->year,
            'width' => $request->width,
            'height' => $request->height,
            'depth' => $request->depth,
            'description' => $request->description,
            'condition' => $request->condition,
            'origin' => $request->origin,
            'artist' => $request->artist,
            'artwork_image_path' => $artworkImagePath,
            'signature_image_path' => $signatureImagePath,
            'optional_image_path' => $optionalImagePath,
            'min_price' => $request->min_price,
            'max_price' => $request->max_price,
            'buyout_price' => $request->buyout_price,
            'end_date' => $formattedEndDate,
        ]);

        return redirect()->route('myAuctions');
    }

    public function auctionDetail(Request $request, Auction $auction, $auctionTitle = null) {
        $isInWatchlist = $this->getWatchlistAuctionInfo($auction->id)['isInWatchlist'];
        $amountOfBids = $auction->bids->count();
        $amountOfBidsByCurrentUser = $auction->bids->where('user_id', Auth::id())->count();

        return view('auction_detail', compact('auction', 'isInWatchlist', 'amountOfBids', 'amountOfBidsByCurrentUser'));
    }

    public function auctionBuyout(Request $request, Auction $auction, $auctionTitle = null) {
        if($auction->status == 'active') {
            $auction->status = 'sold';
            $auction->save();
        }

        return view('thank_you');
    }

    public function addBid(AddBid $request, Auction $auction, $auctionTitle = null) {
        if($auction->status == 'active') {
            Bid::create([
                'user_id' => Auth::id(),
                'auction_id' => $auction->id,
                'price' => $request->bid_price,
            ]);
        }

        return redirect()->back();
    }

    public function addAuctionToWatchlist(Request $request, Auction $auction, $auctionTitle = null) {
        $isInWatchlist = $this->getWatchlistAuctionInfo($auction->id)['isInWatchlist'];

        if($auction->status == 'active' && !$isInWatchlist) {
            WatchlistItem::create([
                'user_id' => Auth::id(),
                'auction_id' => $auction->id,
            ]);
        }

        return redirect()->back();
    }

    public function setLocale(Request $request, $locale) {
        $locales = ['nl', 'fr', 'en'];

        if(in_array($locale, $locales)) {
            $request->session()->put('locale', $locale);
        }

        return redirect()->back();
    }

    public function redirectHome(Request $request) {
        return redirect()->route('home');
    }


    // Helper function
    public function getWatchlistAuctionInfo($auctionId) {
        $watchlistAuction = WatchlistItem::where([['user_id', Auth::id()], ['auction_id', $auctionId]]);
        $isInWatchlist = !$watchlistAuction->get()->isEmpty();

        return ['isInWatchlist' => $isInWatchlist, 'watchlistAuction' => $watchlistAuction];
    }
}
