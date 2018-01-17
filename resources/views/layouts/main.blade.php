@extends('layouts.app')

@section('main')
    <div class="wrapper">
        <main>
            {{ Breadcrumbs::render() }}
            @yield('content')
        </main>
    </div>
@endsection
