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
                                @lang('header.register')
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('login') }}" {{ Route::is('login') ? 'class=active' : null }}>
                                @lang('header.login')
                            </a>
                        </li>
                    </ul>
                </nav>
                @include('includes.search')
            </div>
        </div>
        <div class="stretch-bg">
            <div class="wrapper">
                <div class="header-nav">
                    <nav>
                        <ul>
                            <li><a href="{{ route('/') }}">@lang('header.home')</a></li>
                            <li><a href="{{ route('art') }}">@lang('header.art')</a></li>
                            <li><a href="{{ route('isearch') }}">@lang('header.isearch')</a></li>
                            <li><a href="{{ route('myauctions') }}">@lang('header.myauctions')</a></li>
                            <li><a href="{{ route('mybids') }}">@lang('header.mybids')</a></li>
                            <li><a href="{{ route('contact') }}">@lang('header.contact')</a></li>
                        </ul>
                    </nav>
                    <span class="languages">
                        <ul>
                            <li>
                                <a href="/nl/{{ Route::currentRouteName() }}" {{ App::isLocale('nl') ? 'class=active' : null }}>
                                    @lang('header.nl')
                                </a>
                            </li>
                            <li>
                                <a href="/fr/{{ Route::currentRouteName() }}" {{ App::isLocale('fr') ? 'class=active' : null }}>
                                    @lang('header.fr')
                                </a>
                            </li>
                            <li>
                                <a href="/en/{{ Route::currentRouteName() }}" {{ App::isLocale('en') ? 'class=active' : null }}>
                                    @lang('header.en')
                                </a>
                            </li>
                        </ul>
                    </span>
                </div>
            </div>
        </div>
    </header>
    @yield('content')
    <footer>
        <div class="wrapper">
            <div class="sitemap">
                <div>
                    <ul>
                        <li>@lang('footer.help')</li>
                        <li><a href="#">@lang('footer.login')</a></li>
                        <li><a href="#">@lang('footer.register')</a></li>
                    </ul>
                    <ul>
                        <li>@lang('footer.help')</li>
                        <li><a href="#">@lang('footer.tos')</a></li>
                        <li><a href="#">@lang('footer.privacy_policy')</a></li>
                        <li><a href="#">@lang('footer.faq')</a></li>
                        <li><a href="#">@lang('footer.contact_us')</a></li>
                        <li><a href="#">@lang('footer.about_us')</a></li>
                    </ul>
                    <ul>
                        <li>@lang('footer.languages')</li>
                        <li><a href="#">@lang('footer.dutch')</a></li>
                        <li><a href="#">@lang('footer.french')</a></li>
                        <li><a href="#">@lang('footer.english')</a></li>
                    </ul>
                </div>
                <div>
                    <ul>
                        <li>@lang('footer.style')</li>
                        <li><a href="#">@lang('footer.abstract')</a></li>
                        <li><a href="#">@lang('footer.african_american')</a></li>
                        <li><a href="#">@lang('footer.asian_contemporary')</a></li>
                        <li><a href="#">@lang('footer.conceptual')</a></li>
                        <li><a href="#">@lang('footer.emerging_artists')</a></li>
                        <li><a href="#">@lang('footer.figurative')</a></li>
                        <li><a href="#">@lang('footer.middle_eastern_contemporary')</a></li>
                        <li><a href="#">@lang('footer.minimalism')</a></li>
                        <li><a href="#">@lang('footer.modern')</a></li>
                        <li><a href="#">@lang('footer.pop')</a></li>
                        <li><a href="#">@lang('footer.urban')</a></li>
                        <li><a href="#">@lang('footer.vintage_photographs')</a></li>
                    </ul>
                    <ul>
                        <li>@lang('footer.style')</li>
                        <li><a href="#">@lang('footer.design')</a></li>
                        <li><a href="#">@lang('footer.paintings_and_works_on_paper')</a></li>
                        <li><a href="#">@lang('footer.photographs')</a></li>
                        <li><a href="#">@lang('footer.prints_and_multiples')</a></li>
                        <li><a href="#">@lang('footer.sculpture')</a></li>
                    </ul>
                </div>
                <div>
                    <ul>
                        <li>@lang('footer.price')</li>
                        <li><a href="#">@lang('footer.up_to_5000')</a></li>
                        <li><a href="#">@lang('footer.5000_10000')</a></li>
                        <li><a href="#">@lang('footer.10000_25000')</a></li>
                        <li><a href="#">@lang('footer.25000_50000')</a></li>
                        <li><a href="#">@lang('footer.50000_100000')</a></li>
                        <li><a href="#">@lang('footer.above')</a></li>
                    </ul>
                    <ul>
                        <li>@lang('footer.era')</li>
                        <li><a href="#">@lang('footer.pre_war')</a></li>
                        <li><a href="#">@lang('footer.1940_1950')</a></li>
                        <li><a href="#">@lang('footer.1960_1980')</a></li>
                        <li><a href="#">@lang('footer.1990_present')</a></li>
                    </ul>
                    <ul>
                        <li>@lang('footer.endings')</li>
                        <li><a href="#">@lang('footer.ending_this_week')</a></li>
                        <li><a href="#">@lang('footer.newly_listed')</a></li>
                        <li><a href="#">@lang('footer.purchase_now')</a></li>
                        <li><a href="#">@lang('footer.1990_present')</a></li>
                    </ul>
                </div>
            </div>
            <div class="contact">
                <ul>
                    <li>@lang('footer.find_what_you_need')</li>
                    <li>@include('includes.search')</li>
                </ul>
                <ul>
                    <li>@lang('footer.contact')</li>
                    <li>@lang('footer.landoretti_art')</li>
                    <li>@lang('footer.street_name')</li>
                    <li>@lang('footer.oostende')</li>
                </ul>
            </div>
        </div>
    </footer>
    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
