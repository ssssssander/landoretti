@extends('layouts.app')

@section('title', trans('profile.profile'))

@section('content')
    <div class="wrapper">
        <main class="profile">
            <h1>@lang('profile.profile')</h1>
            <p>{{ $user->name }}</p>
            <p>{{ $user->email }}</p>
            <p>{{ $user->phone_number }}</p>
            <p>{{ $user->address }}</p>
            <p>{{ $user->zip }}, {{ $user->city }}</p>
            <p>@lang('register.vat_number')</p>
            <p>{{ $user->vat_number }}</p>
            <p>@lang('register.account_number')</p>
            <p>{{ $user->account_number }}</p>
        </main>
    </div>
@endsection
