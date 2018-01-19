@extends('layouts.main')

@section('title', trans('art.art'))

@section('content')
    <div id="filter">
        <div class="filter-menu">
            <p class="categories">
                <span>@lang('art.sort_by')</span>
                <a href="#" v-on:click.prevent="sort('ending_soonest')" v-bind:class="{ active: sortBy == 'ending_soonest' }">@lang('art.ending_soonest')</a>
                <a href="#" v-on:click.prevent="sort('ending_latest')" v-bind:class="{ active: sortBy == 'ending_latest' }">@lang('art.ending_latest')</a>
                <a href="#" v-on:click.prevent="sort('new_auctions')" v-bind:class="{ active: sortBy == 'new_auctions' }">@lang('art.new_auctions')</a>
                <a href="#" v-on:click.prevent="sort('popular_auctions')" v-bind:class="{ active: sortBy == 'popular_auctions' }">@lang('art.popular_auctions')</a>
            </p>
            <a href="#" v-on:click.prevent="toggleFilterPane" class="advanced">@lang('art.advanced_options')<span v-bind:style="{ transform: transform}" class="icons-arrow_down"></span></a>
        </div>
        <transition name="fade">
            <div v-if="filterPaneIsShown" class="filter-pane">
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
                        @foreach(trans('footer.endings_texts') as $endings_text)
                            @if($loop->first)
                                <li>{{ $endings_text }}</li>
                            @else
                                <li><a href="#">{{ $endings_text }}</a></li>
                            @endif
                        @endforeach
                    </ul>
                </div>
                <div class="col">
                    <ul>
                        <li>@lang('footer.style')</li>
                        @foreach(trans('footer.styles') as $style)
                            <li>
                                <a href="#">{{ $style }}</a>
                                {!! Form::checkbox("sortBy[{$loop->index}]", array_search($style, trans('footer.styles')), '', ['id' => "sortBy[{$loop->index}]"]) !!}
                                <label for="{{ "sortBy[{$loop->index}]" }}"><span></span></label>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </transition>
    </div>
    @include('partials.auction_cards', ['auctions' => $auctions])
@endsection
