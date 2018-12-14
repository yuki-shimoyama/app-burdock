@php
    $title = env('APP_NAME');
@endphp

@extends('layouts.px2_main')
@section('title', 'Burdock')
@section('content')
<div class="container">
    <h1>{{ $title }}</h1>
    <p>
        {{ $title }} へようこそ。<br />
    </p>
    <script type="text/javascript" src="/js/tinymce/tinymce.min.js"></script>
    <script type="text/javascript">
        tinymce.init({
            selector : 'textarea',
            plugins  : 'jbimages link autolink preview',
            toolbar  : 'bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link jbimages | preview',
            menubar  : false,
            relative_urls : false,
            language : 'ja'
        });
    </script>
    <textarea name="hoge" style="height: 650px;"></textarea>
</div>
@endsection
