@php
    $title = __('Contents');
@endphp
@extends('layouts.my')
@section('content')
    <div class="container">
        <h1 id="post-title">{{ $title }}</h1>
        <hr>
        <p>
            <dt class="col-md-2">{{ __('Project Name') }}:</dt>
            <dd class="col-md-10">{{ $bd_object->config->name }}</dd>
        </p>
    </div>
@endsection
