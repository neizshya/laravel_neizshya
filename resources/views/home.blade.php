@extends('layouts.app')
@section('content')
    <header class="container card py-3 mb-4 border-bottom ">
        <p class="h1">{{ $title }}</p>

    </header>

    <div class="container">
        <p class="h1">Selamat Datang, {{ auth()->user()->name ?? 'Guest' }}</p>
    </div>
@endsection
