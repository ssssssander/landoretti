@extends('layouts.app')

@section('title', trans('new_auction.new_auction'))

@section('content')
    <div class="wrapper">
        <main class="new-auction">
            <h1>@lang('new_auction.new_auction')</h1>
            @include('includes.errors')
            {!! Form::open(['route' => 'addAuction', 'files' => true]) !!}
            <div class="row">
                <div class="row-item two-third">
                    {!! Form::select('style', trans('footer.styles1'), null, ['placeholder' => trans('new_auction.style'), 'class' => $errors->has('style') ? 'has-error' : '']) !!}
                </div>
            </div>
            <div class="row">
                <div class="row-item two-third">
                    {!! Form::label('title', trans('new_auction.title')) !!}
                    {!! Form::text('title', '', ['placeholder' => trans('new_auction.title'), 'class' => $errors->has('title') ? 'has-error' : '']) !!}
                </div>
                <div class="row-item third">
                    {!! Form::label('year', trans('new_auction.year')) !!}
                    {!! Form::text('year', '', ['class' => $errors->has('year') ? 'has-error' : '']) !!}
                </div>
            </div>
            <div class="row">
                <div class="row-item third">
                    {!! Form::label('width', trans('new_auction.width')) !!}
                    {!! Form::text('width', '', ['class' => $errors->has('width') ? 'has-error' : '']) !!}
                </div>
                <div class="row-item third">
                    {!! Form::label('height', trans('new_auction.height')) !!}
                    {!! Form::text('height', '', ['class' => $errors->has('height') ? 'has-error' : '']) !!}
                </div>
                <div class="row-item third optional">
                    {!! Form::label('depth', trans('new_auction.depth')) !!}
                    {!! Form::label('depth', trans('new_auction.optional')) !!}
                    {!! Form::text('depth', '', ['class' => $errors->has('depth') ? 'has-error' : '']) !!}
                </div>
            </div>
            <div class="row">
                <div class="row-item full">
                    {!! Form::label('description', trans('new_auction.description')) !!}
                    {!! Form::textarea('description', '', ['placeholder' => trans('new_auction.description_placeholder'), 'class' => $errors->has('description') ? 'has-error' : '']) !!}
                </div>
            </div>
            <div class="row">
                <div class="row-item full">
                    {!! Form::label('condition', trans('new_auction.condition')) !!}
                    {!! Form::textarea('condition', '', ['placeholder' => trans('new_auction.condition_placeholder'), 'class' => $errors->has('condition') ? 'has-error' : '']) !!}
                </div>
            </div>
            <div class="row">
                <div class="row-item full">
                    {!! Form::label('origin', trans('new_auction.origin')) !!}
                    {!! Form::text('origin', '', ['placeholder' => trans('new_auction.origin_placeholder'), 'class' => $errors->has('origin') ? 'has-error' : '']) !!}
                </div>
            </div>
            <div class="row">
                <div class="row-item full">
                    {!! Form::label('photos', trans('new_auction.photos')) !!}
                    @foreach(trans('new_auction.photos_texts') as $photos_text)
                        <p>{{ $photos_text }}</p>
                    @endforeach
                </div>
            </div>
            <div class="row">
                @foreach(trans('new_auction.upload_texts') as $key => $upload_text)
                    <div class="row-item third">
                        {!! Form::label("{$key}_image", $upload_text, ['class' => 'upload']) !!}
                        {!! Form::file("{$key}_image") !!}
                    </div>
                @endforeach
            </div>
            <div class="row">
                <div class="row-item">
                    <h2>@lang('new_auction.pricing')</h2>
                </div>
            </div>
            <div class="row cash">
                <div class="row-item third">
                    {!! Form::label('min_price', trans('new_auction.min_price')) !!}
                    {!! Form::text('min_price', '', ['class' => $errors->has('min_price') ? 'has-error' : '']) !!}
                </div>
                <div class="row-item third">
                    {!! Form::label('max_price', trans('new_auction.max_price')) !!}
                    {!! Form::text('max_price', '', ['class' => $errors->has('max_price') ? 'has-error' : '']) !!}
                </div>
                <div class="row-item third optional">
                    {!! Form::label('buyout_price', trans('new_auction.buyout_price')) !!}
                    {!! Form::label('buyout_price', trans('new_auction.optional')) !!}
                    {!! Form::text('buyout_price', '', ['class' => $errors->has('buyout_price') ? 'has-error' : '']) !!}
                </div>
            </div>
            <div class="row">
                <div class="row-item third">
                    {!! Form::label('end_date', trans('new_auction.end_date')) !!}
                    {!! Form::text('end_date', '', ['placeholder' => trans('new_auction.end_date_placeholder'), 'class' => $errors->has('end_date') ? 'has-error' : '']) !!}
                </div>
                <div class="row-item two-third">
                    {!! Form::label('attention', trans('new_auction.attention')) !!}
                    @foreach(trans('new_auction.attention_texts') as $attention_text)
                        <p>{{ $attention_text }}</p>
                    @endforeach
                </div>
            </div>
            @include('includes.agree_tac')
            <div class="row">
                <div class="row-item">
                    {!! Form::submit(trans('new_auction.add_auction')) !!}
                    <a href="#">@lang('new_auction.ask_a_question')</a>
                </div>
            </div>
            {!! Form::close() !!}
        </main>
    </div>
@endsection
