{{-- @extends('layouts.My_master_auth')

@section('content')
    <div class="row">
        <form action="{{ route('register') }}" method="post" class="form-horizontal" style="margin-top: 50px;">
            <div class="form-group">
                <label class="col-sm-3 control-label" for="InputName">* スペースID</label>
                <div class="col-sm-6">
                    <input type="text" name="spaceid" class="form-control" id="InputSpaceID" placeholder="スペースID（半角英数）">
                    <!--/.col-sm-10--->
                </div>
                    <!--/form-group-->
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label" for="InputName">* 組織名</label>
                <div class="col-sm-6">
                    <input type="text" name="organization" class="form-control" id="InputOrganization" placeholder="組織名（例：Pickles2 Project）">
                    <!--/.col-sm-10--->
                </div>
                    <!--/form-group-->
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label" for="InputName">* 氏名</label>
                <div class="col-sm-6">
                    <input type="text" name="name" class="form-control" id="InputName" placeholder="氏名">
                    <!--/.col-sm-10--->
                </div>
                    <!--/form-group-->
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label" for="InputEmail">* メールアドレス</label>
                <div class="col-sm-6">
                    <input type="email" name="email" class="form-control" id="InputEmail" placeholder="メールアドレス">
                </div>
                <!--/form-group-->
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label" for="InputPassword">* パスワード</label>
                <div class="col-sm-6">
                    <input type="password" name="password" class="form-control" id="InputPassword" placeholder="パスワード（半角英数8文字以上）">
                </div>
                <!--/form-group-->
            </div>

            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-primary btn-block">新規登録</button>
                </div>
                <!--/form-group-->
            </div>
            {{ csrf_field() }}
        </form>
    </div>
@endsection --}}


@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('ユーザー登録') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="spaceid" class="col-md-4 col-form-label text-md-right">{{ __('スペースID') }}</label>

                            <div class="col-md-6">
                                <input id="spaceid" type="text" class="form-control{{ $errors->has('spaceid') ? ' is-invalid' : '' }}" name="spaceid" value="{{ old('spaceid') }}" placeholder="スペースID（半角英数）" autofocus>

                                @if ($errors->has('spaceid'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('spaceid') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="organization" class="col-md-4 col-form-label text-md-right">{{ __('組織名') }}</label>

                            <div class="col-md-6">
                                <input id="organization" type="text" class="form-control{{ $errors->has('organization') ? ' is-invalid' : '' }}" name="organization" value="{{ old('organization') }}" placeholder="組織名（例：Pickles2 Project）">

                                @if ($errors->has('organization'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('organization') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('氏名') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" placeholder="氏名">

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('メールアドレス') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="メールアドレス">

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('パスワード') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="パスワード（半角英数8文字以上）">

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('パスワード（確認用）') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="パスワード（もう一度入力）">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
