@php
    $title = env('APP_NAME');
@endphp

@extends('layouts.my')
@section('title', 'Burdock')
@section('content')
<div class="container">
    <h1>{{ $title }}</h1>
    <p>
        {{ $title }} へようこそ。<br />
    </p>
</div>
@endsection
