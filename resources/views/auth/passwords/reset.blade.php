@extends('layouts.main')

@section('title', trans('passwords.reset_password'))

@section('content')
    <div>
        <h1>@lang('passwords.reset_password')</h1>
        @include('partials.errors')
        {!! Form::open(['route' => 'password.request']) !!}
        {!! Form::hidden('token', $token) !!}
        <div class="row">
            <div class="row-item full">
                {!! Form::label('email', trans('register.email')) !!}
                {!! Form::email('email', '', ['class' => $errors->has('email') ? 'has-error' : '', 'maxlength' => 255]) !!}
            </div>
        </div>
        <div class="row">
            <div class="row-item full">
                {!! Form::label('password', trans('register.password')) !!}
                {!! Form::password('password', '', ['class' => $errors->has('password') ? 'has-error' : '', 'minlength' => 6]) !!}
            </div>
        </div>
        <div class="row">
            <div class="row-item full">
                {!! Form::label('password_confirmation', trans('register.password_confirmation')) !!}
                {!! Form::password('password_confirmation', '', ['class' => $errors->has('password_confirmation') ? 'has-error' : '', 'minlength' => 6]) !!}
            </div>
        </div>
        <div class="row">
            <div class="row-item">
                {!! Form::submit(trans('passwords.reset_password'), ['class' => 'big-button']) !!}
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@endsection
