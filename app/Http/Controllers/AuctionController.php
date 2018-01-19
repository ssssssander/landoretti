<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AddAuction;
use App\Http\Requests\AddBid;
use App\Auction;
use App\Bid;
use Carbon\Carbon;
use Auth;
use Image;

class AuctionController extends Controller
{
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
}
