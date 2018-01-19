<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\WatchlistItem;
use Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    // Helper function
    public function getWatchlistAuctionInfo($auctionId) {
        $watchlistAuction = WatchlistItem::where([['user_id', Auth::id()], ['auction_id', $auctionId]]);
        $isInWatchlist = !$watchlistAuction->get()->isEmpty();

        return ['isInWatchlist' => $isInWatchlist, 'watchlistAuction' => $watchlistAuction];
    }
}
