@extends('layouts.main')

@section('title', trans('header.forgot_password'))

@section('content')
    <div>
        <h1>@lang('header.forgot_password')</h1>
        @include('partials.errors')
        {!! Form::open(['route' => 'password.email']) !!}
        <div class="row">
            <div class="row-item full">
                {!! Form::label('email', trans('register.email')) !!}
                {!! Form::email('email', '', ['class' => $errors->has('email') ? 'has-error' : '', 'maxlength' => 255]) !!}
            </div>
        </div>
        <div class="row">
            <div class="row-item">
                {!! Form::submit(trans('passwords.send_reset_link'), ['class' => 'big-button']) !!}
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@endsection
