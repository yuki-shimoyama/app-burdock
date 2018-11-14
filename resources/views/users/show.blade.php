@php
    $title = __('User') . ': ' . $user->name;
@endphp
@extends('layouts.my')
@section('content')
<div class="container">
    <h1>{{ $title }}</h1>

    {{-- 編集・削除ボタン --}}
    @can('edit', $user)
        <div>
            <a href="{{ url('users/'.$user->id.'/edit') }}" class="btn btn-primary">
                {{ __('Edit') }}
            </a>
            {{-- 削除ボタンは後で正式なものに置き換えます --}}
            @component('components.btn-del')
                @slot('controller', 'users')
                @slot('id', $user->id)
                @slot('name', $user->title)
            @endcomponent
        </div>
    @endcan

    {{-- ユーザー1件の情報 --}}
    <dl class="row">
        <dt class="col-md-2">{{ __('ID') }}</dt>
        <dd class="col-md-10">{{ $user->id }}</dd>
        <dt class="col-md-2">{{ __('Name') }}</dt>
        <dd class="col-md-10">{{ $user->name }}</dd>
        <dt class="col-md-2">{{ __('E-Mail Address') }}</dt>
        <dd class="col-md-10">{{ $user->email }}</dd>
    </dl>
    {{-- ユーザーの記事一覧 --}}
    <h2>{{ __('Projects') }}</h2>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>{{ __('Project Name') }}</th>
                    <th>{{ __('Git URL') }}</th>
                    <th>{{ __('Created') }}</th>
                    <th>{{ __('Updated') }}</th>

                    {{-- 記事の編集・削除ボタンのカラム --}}
                    @can('edit', $user)
                        <th></th>
                    @endcan
                </tr>
            </thead>
            <tbody>
                @foreach ($user->projects as $project)
                    <tr>
                        <td>
                            <a href="{{ url('projects/' . $project->id) }}">
                                {{ $project->title }}
                            </a>
                        </td>
                        <td>{{ $project->git_url }}</td>
                        <td>{{ $project->created_at }}</td>
                        <td>{{ $project->updated_at }}</td>
                        @can('edit', $user)
                            <td nowrap>
                                <a href="{{ url('projects/' . $project->id . '/edit') }}" class="btn btn-primary">
                                    {{ __('Edit') }}
                                </a>
                                @component('components.btn-del')
                                    @slot('controller', 'projects')
                                    @slot('id', $project->id)
                                    @slot('name', $project->title)
                                @endcomponent
                            </td>
                        @endcan
                     </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{ $user->projects->links() }}
</div>
@endsection
