<header>
    <div class="wrapper">
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
    @include('includes.header-nav')
</header>
