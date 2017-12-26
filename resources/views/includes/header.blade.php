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
                        <li>
                            <div id="login">
                                <a href="#" v-on:click.prevent="showLoginInputs" v-if="!clickedLoginBtn">
                                    @lang('header.login')
                                </a>
                                {!! Form::open(['route' => 'login', 'v-if' => 'clickedLoginBtn']) !!}
                                {!! Form::email('email', '', ['placeholder' => trans('header.email')]) !!}
                                {!! Form::password('password', ['placeholder' => trans('header.password')]) !!}
                                {!! Form::submit('') !!}
                                {!! Form::close() !!}
                            </div>
                        </li>
                    @endguest
                    @auth
                        <li>
                            <a href="#">watchl</a>
                        </li>
                        <li>
                            <a href="#">prfl</a>
                        </li>
                        <li class="logout">
                            <a href="#">
                                {!! Form::open(['route' => 'logout']) !!}
                                {!! Form::submit('l_o') !!}
                                {!! Form::close() !!}
                            </a>
                        </li>
                    @endauth
                </ul>
            </nav>
            @include('includes.search')
        </div>
    </div>
    @include('includes.header-nav')
</header>
