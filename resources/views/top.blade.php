@php
    $title = env('APP_NAME');
@endphp

@extends('layouts.my')
@section('title', 'demo-laravel-crud')
@section('content')
<div class="container">
    <h1>{{ $title }}</h1>
    <p>
        {{ __('My practice for basic CRUD of Laravel 5.7.') }}
    </p>
    <ul>
        <li>
            GitHub:
            <a href="https://github.com/pickles2/app-burdock" target="_blank">
                https://github.com/pickles2/app-burdock
            </a>
        </li>
    </ul>
</div>
@endsection
