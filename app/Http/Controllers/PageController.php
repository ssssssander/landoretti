<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class PageController extends Controller
{
    public function home() {
        return view('home');
    }

    public function art() {
        return view('home');
    }

    public function isearch(Request $request) {
        $query = $request->input('query');

        return view('home', compact('query'));
    }

    public function myauctions() {
        return view('home');
    }

    public function mybids() {
        return view('home');
    }

    public function contact() {
        return view('home');
    }

    public function profile() {
        return view('home');
    }
}
