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
                    <li><a href="#">@lang('footer.tos')</a></li>
                    <li><a href="#">@lang('footer.privacy_policy')</a></li>
                    <li><a href="#">@lang('footer.faq')</a></li>
                    <li><a href="#">@lang('footer.contact_us')</a></li>
                    <li><a href="#">@lang('footer.about_us')</a></li>
                </ul>
                <ul>
                    <li>@lang('footer.languages')</li>
                    <li><a href="{{ route('setLocale', ['locale' => 'nl']) }}">@lang('footer.dutch')</a></li>
                    <li><a href="{{ route('setLocale', ['locale' => 'fr']) }}">@lang('footer.french')</a></li>
                    <li><a href="{{ route('setLocale', ['locale' => 'en']) }}">@lang('footer.english')</a></li>
                </ul>
            </div>
            <div class="col">
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
            <div class="col">
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
                <li>
                    <div>
                        <p class="phone-icon">@lang('footer.phone_number')</p>
                        <p class="mail-icon"><a href="mailto:@lang('footer.email_address')">@lang('footer.email_address')</a></p>
                    </div>
                </li>
            </ul>
            <div class="social">
                <a class="facebook-icon" href="https://www.facebook.com"></a>
                <a class="twitter-icon" href="https://www.twitter.com"></a>
                <a class="youtube-icon" href="https://www.youtube.com"></a>
                <a class="plus-icon" href="https://www.plus.google.com"></a>
            </div>
            <div class="copyright">@lang('footer.copyright')</div>
        </div>
    </div>
</footer>
@include('includes.header-nav')
