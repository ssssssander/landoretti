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
                        <div id="login">
                            <a href="#" v-on:click.prevent="showLoginInputs" v-if="!clickedLoginBtn">
                                @lang('header.login')
                            </a>
                            {!! Form::open(['route' => '/', 'v-if' => 'clickedLoginBtn']) !!}
                            {!! Form::email('email', '', ['placeholder' => trans('header.user')]) !!}
                            {!! Form::password('password', ['placeholder' => trans('header.password')]) !!}
                            {!! Form::submit('') !!}
                            {!! Form::close() !!}
                        </div>
                    </li>
                </ul>
            </nav>
            @include('includes.search')
        </div>
    </div>
    @include('includes.header-nav')
</header>
