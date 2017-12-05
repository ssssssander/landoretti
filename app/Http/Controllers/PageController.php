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

    public function isearch($query = null) {
        return view('home');
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
}
