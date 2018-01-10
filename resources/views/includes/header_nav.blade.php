<div class="stretch-bg">
    <div class="wrapper">
        <div class="header-nav">
            <nav>
                <ul>
                    <li><a href="{{ route('home') }}">@lang('header.home')</a></li>
                    <li><a href="{{ route('art') }}">@lang('header.art')</a></li>
                    <li><a href="{{ route('iSearch') }}">@lang('header.isearch')</a></li>
                    <li><a href="{{ route('myAuctions') }}">@lang('header.myauctions')</a></li>
                    <li><a href="#">@lang('header.mybids')</a></li>
                    <li><a href="#">@lang('header.contact')</a></li>
                </ul>
            </nav>
            <span class="languages">
                <ul>
                    @foreach(trans('header.languages') as $key => $language)
                        <li>
                            <a href="{{ route('setLocale', ['locale' => $key]) }}" {{ App::isLocale($key) ? 'class=active' : null }}>
                                {{ $language }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </span>
        </div>
    </div>
</div>
