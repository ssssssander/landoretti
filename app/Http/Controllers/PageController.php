<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App;

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

    public function addAuction(Request $request) {
        return view('home');
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
}
