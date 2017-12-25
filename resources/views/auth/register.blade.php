@extends('layouts.app')

@section('title', trans('header.register'))

@section('content')
    <div class="wrapper">
        <main>
            {!! Form::open(['route' => 'register', 'class' => 'register']) !!}
            <h1>@lang('register.register')</h1>
            <div>
                {!! Form::label('name', trans('register.name')) !!}
                {!! Form::text('name') !!}
                {!! Form::label('name', trans('register.name')) !!}
                {!! Form::text('name') !!}
                {!! Form::label('name', trans('register.name')) !!}
                {!! Form::text('name') !!}
                {!! Form::label('name', trans('register.name')) !!}
                {!! Form::text('name') !!}
                {!! Form::label('name', trans('register.name')) !!}
                {!! Form::text('name') !!}
            </div>
            <div>
                {!! Form::label('name', trans('register.name')) !!}
                {!! Form::text('name') !!}
                {!! Form::label('name', trans('register.name')) !!}
                {!! Form::text('name') !!}
                {!! Form::label('name', trans('register.name')) !!}
                {!! Form::text('name') !!}
                {!! Form::label('name', trans('register.name')) !!}
                {!! Form::text('name') !!}
                {!! Form::label('name', trans('register.name')) !!}
                {!! Form::text('name') !!}
            </div>
            {!! Form::label('name', trans('register.name')) !!}
            {!! Form::text('name') !!}
            {!! Form::submit(trans('register.register_submit')) !!}
            {!! Form::close() !!}
        </main>
    </div>
@endsection
