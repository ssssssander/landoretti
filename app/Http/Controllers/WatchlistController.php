<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Auction;
use App\WatchlistItem;
use Auth;

class WatchlistController extends Controller
{
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
}
