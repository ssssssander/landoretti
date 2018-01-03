@extends('layouts.app')

@section('title', $auction->title)

@section('content')
    <div class="wrapper">
        <main>
            <h1>{{ $auction->title }}</h1>
        </main>
    </div>
@endsection
