<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Auction;
use Auth;

class EtcController extends Controller
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

    public function profile(Request $request) {
        $user = Auth::user();
        $activeAuctions = Auction::where('status', 'active')->take(4)->get();

        return view('profile', compact('user', 'activeAuctions'));
    }

    public function iSearch(Request $request) {
        $query = $request->input('query');
        $searchResults = Auction::where([['title', 'like', "%{$query}%"], ['status', 'active']])->paginate(8);

        return view('isearch', compact('searchResults'));
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
