@php
    $title = $project->project_name;
@endphp
@extends('layouts.my')
@section('content')
<div class="container">
    <h1 id="project-title">{{ $title }}</h1>

    {{-- 編集・削除ボタン --}}
    @can('edit', $project)
        <div class="edit">
            <a href="{{ url('projects/'.$project->project_name.'/'.$branch_name.'/edit') }}" class="btn btn-primary">
                {{ __('Edit') }}
            </a>
            @component('components.btn-del')
                @slot('controller', 'projects')
                @slot('id', $project->id)
                @slot('name', $project->project_name)
                @slot('branch', get_git_remote_default_branch_name())
            @endcomponent
        </div>
    @endcan

    {{-- 記事内容 --}}
    <dl class="row">
        <dt class="col-md-2">{{ __('Author') }}:</dt>
        <dd class="col-md-10">
                {{ $project->user->name }}
        </dd>
        <dt class="col-md-2">{{ __('Created') }}:</dt>
        <dd class="col-md-10">
            <time itemprop="dateCreated" datetime="{{ $project->created_at }}">
                {{ $project->created_at }}
            </time>
        </dd>
        <dt class="col-md-2">{{ __('Updated') }}:</dt>
        <dd class="col-md-10">
            <time itemprop="dateModified" datetime="{{ $project->updated_at }}">
                {{ $project->updated_at }}
            </time>
        </dd>
    </dl>
    <hr>
    <div class="card ml-4 float-left" style="width: 20rem;">
    <img class="card-img-top" src="http://placehold.jp/318x180.png" alt="Card image cap">
        <div class="card-body">
            <h4 class="card-title">{{ __('Edit Sitemap')}}</h4>
            <p class="card-text">サイトマップは、サイト全体のページ構成を定義する概念です。CSVまたはMicrosoft Excelのファイル形式で編集できます。</p>
            <form method="POST" action="{{ url('/upload'.'/'.$project->project_name.'/'.$branch_name) }}" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="form-group custom-file">
                    <input type="file" class="form-control custom-file-input @if ($errors->has('file')) is-invalid @endif" name="file" value="{{ old('file') }}" id="customFile" lang="ja">
                        @if ($errors->has('file'))
                            <span class="invalid-feedback" role="alert">
                                {{ $errors->first('file') }}
                            </span>
                        @endif
                    <label class="custom-file-label" for="customFile">ファイル選択...</label>
                </div>
                <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block mt-2">{{ __('Upload')}}</button>
            </form>

            <form method="POST" action="{{ url('/download'.'/'.$project->project_name.'/'.$branch_name) }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="file">
                <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block mt-2">{{ __('Download')}}</button>
            </form>
        </div>
    </div>

    <div class="card ml-4 float-left" style="width: 20rem;">
    <img class="card-img-top" src="http://placehold.jp/318x180.png" alt="Card image cap">
        <div class="card-body">
            <h4 class="card-title">{{ __('Edit Contents')}}</h4>
            <p class="card-text">コンテンツは、ページレイアウト全体のうちサイトアイデンティティやナビゲーション部分を含まない領域を担当します。</p>
            <a href="{{ url('pages/')}}" class="btn btn-primary btn-lg btn-block">{{ __('Edit')}}</a>
        </div>
    </div>

    <div class="card ml-4 float-left" style="width: 20rem;">
    <img class="card-img-top" src="http://placehold.jp/318x180.png" alt="Card image cap">
        <div class="card-body">
            <h4 class="card-title">{{ __('To Publish')}}</h4>
            <p class="card-text">パブリッシュは、コンテンツを静的なHTMLに書き出します。 動的なHTMLと比べてサーバーへの負荷が軽くなります。</p>
            <a href="#" class="btn btn-primary btn-lg btn-block">{{ __('Run')}}</a>
        </div>
    </div>
    <div class="clearfix"></div>
    <hr>
    <dl class="row">
        <dt class="col-md-2">{{ __('Project Name') }}:</dt>
        <dd class="col-md-10">{{ $bd_object->config->name }}</dd>
        <dt class="col-md-2">{{ __('Project Path') }}:</dt>
        <dd class="col-md-10">{{ $bd_object->realpath_docroot }}</dd>
        <dt class="col-md-2">{{ __('Home Directory') }}:</dt>
        <dd class="col-md-10">{{ $bd_object->packages->package_list->projects[0]->path_homedir }}</dd>
        <dt class="col-md-2">{{ __('Entry Script') }}:</dt>
        <dd class="col-md-10">{{ $bd_object->packages->package_list->projects[0]->path }}</dd>
        <dt class="col-md-2">{{ __('Git URL') }}:</dt>
        <dd class="col-md-10">{{ $project->git_url }}</dd>
    </dl>
</div>
@endsection
