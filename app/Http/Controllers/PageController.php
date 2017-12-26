<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function home() {
        return view('home');
    }

    public function isearch(Request $request) {
        $query = $request->input('query');

        return view('home', compact('query'));
    }

    public function profile(Request $request) {
        $user = Auth::user();

        return view('profile', compact('user'));
    }
}
