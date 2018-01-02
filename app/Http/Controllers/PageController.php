<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AddAuction;
use App\Auction;
use Auth;
use App;
use DateTime;

class PageController extends Controller
{
    public function home(Request $request) {
        return view('home');
    }

    public function iSearch(Request $request) {
        $query = $request->input('query');

        return view('home', compact('query'));
    }

    public function myAuctions(Request $request) {
        return view('my_auctions');
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


        if(!empty($request->optional_image) && $request->optional_image->isValid()) {
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

        return view('my_auctions');
    }

    public function profile(Request $request) {
        $user = Auth::user();

        return view('profile', compact('user'));
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
