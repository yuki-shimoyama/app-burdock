@php
    $title = __('Create Project');
@endphp
@extends('layouts.my')
@section('content')
<div class="container">
    <h1>{{ $title }}</h1>
    <form action="{{ url('projects') }}" method="post">
        @csrf
        @method('POST')
        <div class="form-group">
            <label for="title">{{ __('Project Name') }}</label>
            <input id="title" type="text" class="form-control @if ($errors->has('title')) is-invalid @endif" name="title" value="{{ old('title') }}" required autofocus>
                @if ($errors->has('title'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('title') }}
                    </span>
                @endif
        </div>
        <div class="form-group">
            <label for="git_url">{{ __('Git URL') }}</label>
            <input id="git_url" type="text" class="form-control @if ($errors->has('git_url')) is-invalid @endif" name="git_url"  value="{{ old('git_url') }}">
                @if ($errors->has('git_url'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('git_url') }}
                    </span>
                @endif
        </div>
        <button type="submit" name="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </form>
</div>
@endsection
