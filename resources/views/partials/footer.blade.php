<footer>
    <div class="wrapper">
        <div class="sitemap">
            <div class="col">
                @guest
                    <ul>
                        <li>@lang('footer.help')</li>
                        <li><a href="#">@lang('footer.login')</a></li>
                        <li><a href="{{ route('register') }}">@lang('footer.register')</a></li>
                    </ul>
                @endguest
                <ul>
                    <li>@lang('footer.help')</li>
                    @foreach(trans('footer.help_texts') as $help_text)
                        <li><a href="#">{{ $help_text }}</a></li>
                    @endforeach
                </ul>
                <ul>
                    @foreach(trans('footer.languages') as $key => $language)
                        @if($loop->first)
                            <li>{{ $language }}</li>
                        @else
                            <li><a href="{{ route('setLocale', ['locale' => $key]) }}">{{ $language }}</a></li>
                        @endif
                    @endforeach
                </ul>
            </div>
            <div class="col">
                <ul>
                    <li>@lang('footer.style')</li>
                    @foreach(trans('footer.styles1') as $style)
                        <li><a href="#">{{ $style }}</a></li>
                    @endforeach
                </ul>
                <ul>
                    <li>@lang('footer.style')</li>
                    @foreach(trans('footer.styles2') as $style)
                        <li><a href="#">{{ $style }}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="col">
                <ul>
                    @foreach(trans('footer.prices') as $price)
                        @if($loop->first)
                            <li>{{ $price }}</li>
                        @else
                            <li><a href="#">{{ $price }}</a></li>
                        @endif
                    @endforeach
                </ul>
                <ul>
                    @foreach(trans('footer.eras') as $era)
                        @if($loop->first)
                            <li>{{ $era }}</li>
                        @else
                            <li><a href="#">{{ $era }}</a></li>
                        @endif
                    @endforeach
                </ul>
                <ul>
                    @foreach(trans('footer.endings_texts') as $endings_text)
                        @if($loop->first)
                            <li>{{ $endings_text }}</li>
                        @else
                            <li><a href="#">{{ $endings_text }}</a></li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="contact">
            <ul>
                <li>@lang('footer.find_what_you_need')</li>
                <li>@include('partials.search')</li>
            </ul>
            <ul>
                <li>@lang('footer.contact')</li>
                <li>@lang('footer.landoretti_art')</li>
                <li>@lang('footer.street_name')</li>
                <li>@lang('footer.oostende')</li>
                <li>
                    <div>
                        <p>
                            <span class="icons-phone"></span>
                            <span>@lang('footer.phone_number')</span>
                        </p>
                        <p>
                            <span class="icons-mail"></span>
                            <a href="mailto:@lang('footer.email_address')">@lang('footer.email_address')</a>
                        </p>
                    </div>
                </li>
            </ul>
            <div class="social">
                <a class="icons-facebook" href="https://www.facebook.com"></a>
                <a class="icons-twitter" href="https://www.twitter.com"></a>
                <a class="icons-youtube" href="https://www.youtube.com"></a>
                <a class="icons-plus" href="https://www.plus.google.com"></a>
            </div>
            <div class="copyright">@lang('footer.copyright')</div>
        </div>
    </div>
</footer>
@include('partials.header_nav')
