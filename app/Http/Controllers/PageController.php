<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AddAuction;
use App\Http\Requests\AddBid;
use App\Auction;
use App\Bid;
use App\Watchlist;
use Auth;
use App;
use DateTime;

class PageController extends Controller
{
    public function home(Request $request) {
        return view('home');
    }

    public function watchlist(Request $request) {
        $watchlistAuctions = Watchlist
            ::join('users', function($join) {
                $join->on('watchlists.user_id', 'users.id')
                ->where('watchlists.user_id', Auth::id());
            })
            ->join('auctions', 'watchlists.auction_id', 'auctions.id')->get();

        $activeWatchlistAuctions = $watchlistAuctions->where('status', 'active');
        $expiredWatchlistAuctions = $watchlistAuctions->where('status', 'expired');
        $soldWatchlistAuctions = $watchlistAuctions->where('status', 'sold');

        return view('watchlist', compact('watchlistAuctions', 'activeWatchlistAuctions', 'expiredWatchlistAuctions', 'soldWatchlistAuctions'));
    }

    public function deleteSelectedWatchlistAuctions(Request $request) {
        $auctionIds = $request->input('auctions.*');

        for($i = 0; $i < count($auctionIds); $i++) {
            $watchlistAuction = Watchlist::where([['user_id', Auth::id()], ['auction_id', $auctionIds[$i]]]);
            $isInWatchlist = !$watchlistAuction->get()->isEmpty();

            if($isInWatchlist) {
                $watchlistAuction->delete();
            }
        }

        return redirect()->back();
    }

    public function clearWatchlist(Request $request) {
        Watchlist::where('user_id', Auth::id())->delete();

        return redirect()->back();
    }

    public function profile(Request $request) {
        $user = Auth::user();

        return view('profile', compact('user'));
    }

    public function iSearch(Request $request) {
        $query = $request->input('query');

        return view('home', compact('query'));
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
        $endDate = DateTime::createFromFormat('d/m/y', $request->end_date);
        $formattedEndDate = $endDate->format('Y-m-d');

        if($request->artwork_image->isValid() && $request->signature_image->isValid()) {
            $artworkImagePath = $request->artwork_image->store('uploads/artwork_images');
            $signatureImagePath = $request->signature_image->store('uploads/signature_images');
        }
        else {
            return redirect()->back();
        }


        if($request->optional_image && $request->optional_image->isValid()) {
            $optionalImagePath = $request->optional_image->store('uploads/optional_images');
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
        $watchlistAuction = Watchlist::where([['user_id', Auth::id()], ['auction_id', $auction->id]])->get();
        $isInWatchlist = !$watchlistAuction->isEmpty();
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
        if($auction->status == 'active') {
            Watchlist::create([
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
}
