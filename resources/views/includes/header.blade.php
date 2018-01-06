<header>
    <div class="wrapper">
        <div class="header-personal">
            <nav>
                <ul>
                    @guest
                        <li>
                            <a class="{{ Route::is('register') ? 'active' : '' }}"  href="{{ route('register') }}">
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
                            {!! Form::submit('&gt;') !!}
                            {!! Form::close() !!}
                        </li>
                    @endguest
                    @auth
                        <li>
                            <span class="icons-hamburger"></span>
                            <a class="{{ Route::is('watchlist') ? 'active' : '' }}" href="{{ route('watchlist') }}">
                                @lang('header.watchlist')
                            </a>
                        </li>
                        <li>
                            <span class="icons-person"></span>
                            <a class="{{ Route::is('profile') ? 'active' : '' }}" href="{{ route('profile') }}">
                                @lang('header.profile')
                            </a>
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
