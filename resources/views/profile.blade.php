@extends('layouts.app')

@section('title', trans('profile.profile'))

@section('content')
    <div class="wrapper">
        <main class="profile">
            <h1>@lang('profile.profile')</h1>
            <div class="profile-info">
                <h2>{{ $user->name }}</h2>
                <div class="profile-info-col">
                    <div class="item">
                        <p class="mail-icon"><a href="mailto:{{ $user->email }}">{{ $user->email }}</a></p>
                        <p class="phone-icon">{{ $user->phone_number }}</p>
                    </div>
                    <div class="item">
                        <p>{{ $user->address }}</p>
                        <p>{{ $user->zip }}, {{ $user->city }}</p>
                    </div>
                </div>
                <div class="profile-info-col">
                    <div class="item">
                        <p class="sub-title">@lang('register.vat_number')</p>
                        <p>{{ $user->vat_number }}</p>
                    </div>
                    <div class="item">
                        <p class="sub-title">@lang('register.account_number')</p>
                        <p>{{ $user->account_number }}</p>
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection
