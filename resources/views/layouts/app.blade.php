<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="@lang('header.description')">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }} | @yield('title')</title>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="line"></div>
    <header>
        <div class="wrapper">
            <a href="{{ route('/') }}">
                <img src="{{ asset('img/logo.png') }}" alt="@lang('header.logo_alt')" class="logo">
            </a>
            <div class="header-personal">
                <nav>
                    <ul>
                        <li>
                            <a href="{{ route('register') }}" {{ Route::is('register') ? 'class=active' : null }}>
                                {{ up(trans('header.register')) }}
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('login') }}" {{ Route::is('login') ? 'class=active' : null }}>
                                {{ up(trans('header.login')) }}
                            </a>
                        </li>
                    </ul>
                </nav>
                <form class="search">
                    <input type="text" placeholder="@lang('header.search')">
                    <a href="{{ route('isearch) }}"></a>
                </form>
            </div>
        </div>
        <div class="header-nav-stretch-bg">
            <div class="wrapper">
                <div class="header-nav">
                    <nav>
                        <ul>
                            <li><a href="{{ route('/') }}">{{ up(trans('header.home')) }}</a></li>
                            <li><a href="{{ route('art') }}">{{ up(trans('header.art')) }}</a></li>
                            <li><a href="{{ route('isearch') }}">{{ up(trans('header.isearch')) }}</a></li>
                            <li><a href="{{ route('myauctions') }}">{{ up(trans('header.myauctions')) }}</a></li>
                            <li><a href="{{ route('mybids') }}">{{ up(trans('header.mybids')) }}</a></li>
                            <li><a href="{{ route('contact') }}">{{ up(trans('header.contact')) }}</a></li>
                        </ul>
                    </nav>
                    <span class="languages">
                        <ul>
                            <li>
                                <a href="/nl/{{ Route::currentRouteName() }}" {{ App::isLocale('nl') ? 'class=active' : null }}>
                                    {{ up(trans('header.nl')) }}
                                </a>
                            </li>
                            <li>
                                <a href="/fr/{{ Route::currentRouteName() }}" {{ App::isLocale('fr') ? 'class=active' : null }}>
                                    {{ up(trans('header.fr')) }}
                                </a>
                            </li>
                            <li>
                                <a href="/en/{{ Route::currentRouteName() }}" {{ App::isLocale('en') ? 'class=active' : null }}>
                                    {{ up(trans('header.en')) }}
                                </a>
                            </li>
                        </ul>
                    </span>
                </div>
            </div>
        </div>
    </header>
    @yield('content')
    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
