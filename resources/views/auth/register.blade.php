@extends('layouts.app')

@section('title', trans('register.register'))

@section('content')
    <div class="wrapper">
        <main class="register">
            <h1>@lang('register.register')</h1>
            @include('includes.errors')
            {!! Form::open(['route' => 'register']) !!}
            <div class="row">
                <div class="row-item">
                    {!! Form::label('name', trans('register.name')) !!}
                    {!! Form::text('name', '', ['class' => $errors->has('name') ? 'has-error' : '']) !!}
                </div>
                <div class="row-item">
                    {!! Form::label('email', trans('register.email')) !!}
                    {!! Form::email('email', '', ['class' => $errors->has('email') ? 'has-error' : '']) !!}
                </div>
            </div>
            <div class="row">
                <div class="row-item">
                    {!! Form::label('password', trans('register.password')) !!}
                    {!! Form::password('password', ['class' => $errors->has('password') ? 'has-error' : '']) !!}
                </div>
                <div class="row-item">
                    {!! Form::label('password_confirmation', trans('register.password_confirmation')) !!}
                    {!! Form::password('password_confirmation', ['class' => $errors->has('password_confirmation') ? 'has-error' : '']) !!}
                </div>
            </div>
            <div class="row">
                <div class="row-item">
                    {!! Form::label('country', trans('register.country')) !!}
                    {!! Form::select('country', trans('register.countries'), array_keys(trans('register.countries'))[0], ['class' => $errors->has('country') ? 'has-error' : '']) !!}
                </div>
                <div class="row-item half">
                    <div class="row-item">
                        {!! Form::label('zip', trans('register.zip')) !!}
                        {!! Form::text('zip', '', ['class' => $errors->has('zip') ? 'has-error' : '']) !!}
                    </div>
                    <div class="row-item">
                        {!! Form::label('city', trans('register.city')) !!}
                        {!! Form::text('city', '', ['class' => $errors->has('city') ? 'has-error' : '']) !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="row-item">
                    {!! Form::label('address', trans('register.address')) !!}
                    {!! Form::text('address', '', ['class' => $errors->has('address') ? 'has-error' : '']) !!}
                </div>
                <div class="row-item half">
                    <div class="row-item third">
                        {!! Form::label('phone_number', trans('register.phone_number')) !!}
                        {!! Form::select('calling_code', trans('register.calling_codes'), array_keys(trans('register.calling_codes'))[0], ['class' => $errors->has('calling_code') ? 'has-error' : '']) !!}
                    </div>
                    <div class="row-item two-third">
                        {!! Form::text('phone_number', '', ['class' => $errors->has('phone_number') ? 'has-error' : '']) !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="row-item">
                    {!! Form::label('account_number', trans('register.account_number')) !!}
                    {!! Form::text('account_number', '', ['class' => $errors->has('account_number') ? 'has-error' : '']) !!}
                </div>
                <div class="row-item">
                    {!! Form::label('vat_number', trans('register.vat_number')) !!}
                    {!! Form::text('vat_number', '', ['class' => $errors->has('vat_number') ? 'has-error' : '']) !!}
                </div>
            </div>
            <div class="row">
                <div class="row-item full">
                    {!! Form::label('alt_payment', trans('register.alt_payment')) !!}
                    {!! Form::text('alt_payment', '', ['class' => $errors->has('alt_payment') ? 'has-error' : '']) !!}
                </div>
            </div>
            @include('includes.agree_tac')
            <div class="row">
                <div class="row-item">
                    {!! Form::submit(trans('register.register_submit')) !!}
                </div>
            </div>
            {!! Form::close() !!}
        </main>
    </div>
@endsection
