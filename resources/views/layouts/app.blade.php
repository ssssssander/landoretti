<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="@lang('header.description')">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }} | @yield('title')</title>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container">
        @include('includes.logo', ['position' => 'top'])
        @include('includes.header')
        @yield('content')
        @include('includes.footer')
        @include('includes.logo', ['position' => 'bottom'])
    </div>
    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
