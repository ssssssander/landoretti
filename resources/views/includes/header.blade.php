<header>
    <div class="wrapper">
        <div class="header-personal">
            <nav>
                <ul>
                    @guest
                        <li>
                            <a href="{{ route('register') }}" {{ Route::is('register') ? 'class=active' : null }}>
                                @lang('header.register')
                            </a>
                        </li>
                        <li id="login">
                            <a href="#" v-on:click.prevent="showLoginInputs" v-if="!clickedLoginBtn">
                                @lang('header.login')
                            </a>
                            {!! Form::open(['route' => 'login', 'v-if' => 'clickedLoginBtn']) !!}
                            {!! Form::email('email', '', ['placeholder' => trans('header.email')]) !!}
                            {!! Form::password('password', ['placeholder' => trans('header.password')]) !!}
                            {!! Form::submit('') !!}
                            {!! Form::close() !!}
                        </li>
                    @endguest
                    @auth
                        <li class="watchlist-icon">
                            <a href="#">@lang('header.watchlist')</a>
                        </li>
                        <li class="profile-icon">
                            <a href="{{ route('profile') }}" {{ Route::is('profile') ? 'class=active' : null }}>@lang('header.profile')</a>
                        </li>
                        <li class="logout">
                            <a href="#">
                                {!! Form::open(['route' => 'logout']) !!}
                                {!! Form::submit(trans('header.logout')) !!}
                                {!! Form::close() !!}
                            </a>
                        </li>
                    @endauth
                </ul>
            </nav>
            @include('includes.search')
        </div>
    </div>
    @include('includes.header_nav')
</header>
