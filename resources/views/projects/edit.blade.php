@php
    $title = __('Edit') . ': ' . $project->project_name;
@endphp
@extends('layouts.px2')
@section('content')
<div class="container">
    <h1>{{ $title }}</h1>
    <form action="{{ url('projects/'.$project->project_name.'/'.$branch_name) }}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="project_name">{{ __('Project Name') }}</label>
            <input id="project_name" type="text" class="form-control @if ($errors->has('project_name')) is-invalid @endif" name="project_name" value="{{ old('project_name', $project->project_name) }}" required autofocus>
                @if ($errors->has('project_name'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('project_name') }}
                    </span>
                @endif
        </div>
        <div class="form-group">
            <label for="git_url">{{ __('Git URL') }}</label>
            <input id="git_url" type="text" class="form-control @if ($errors->has('git_url')) is-invalid @endif" name="git_url" value="{{ old('git_url', $project->git_url) }}">
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
