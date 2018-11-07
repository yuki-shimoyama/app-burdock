@extends('layouts.master_auth')

@section('content')
    <div class="row">
        <form action="{{ route('user.signup') }}" method="post" class="form-horizontal" style="margin-top: 50px;">
            <div class="form-group">
                <label class="col-sm-3 control-label" for="InputName">* スペースID</label>
                <div class="col-sm-9">
                    <input type="text" name="spaceid" class="form-control" id="InputSpaceID" placeholder="スペースID（半角英数）">
                    <!--/.col-sm-10--->
                </div>
                    <!--/form-group-->
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label" for="InputName">* 組織名</label>
                <div class="col-sm-9">
                    <input type="text" name="organization" class="form-control" id="InputOrganization" placeholder="組織名（例：Pickles2 Project）">
                    <!--/.col-sm-10--->
                </div>
                    <!--/form-group-->
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label" for="InputName">* 氏名</label>
                <div class="col-sm-9">
                    <input type="text" name="name" class="form-control" id="InputName" placeholder="氏名">
                    <!--/.col-sm-10--->
                </div>
                    <!--/form-group-->
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label" for="InputEmail">* メールアドレス</label>
                <div class="col-sm-9">
                    <input type="email" name="email" class="form-control" id="InputEmail" placeholder="メールアドレス">
                </div>
                <!--/form-group-->
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label" for="InputPassword">* パスワード</label>
                <div class="col-sm-9">
                    <input type="password" name="password" class="form-control" id="InputPassword" placeholder="パスワード（半角英数8文字以上）">
                </div>
                <!--/form-group-->
            </div>

            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-9">
                    <button type="submit" class="btn btn-primary btn-block">新規登録</button>
                </div>
                <!--/form-group-->
            </div>
            {{ csrf_field() }}
        </form>
    </div>
@endsection
