<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class PageController extends Controller
{
    public function home($locale) {
        App::setLocale($locale);

        if (App::isLocale('en')) {
            $hello = 'Hello';
        }

        if (App::isLocale('nl')) {
            $hello = 'Hallo';
        }

        if (App::isLocale('fr')) {
            $hello = 'Bonjour';
        }

        return view('home', compact('hello'));
    }
}
