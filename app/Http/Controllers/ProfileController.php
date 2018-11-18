<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// コントローラ内で頻繁に使うことになるので、モデルをインポートしておきます。
use App\User;
use App\Http\Requests\StoreUser;

class ProfileController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
// 「モデル結合ルート」を利用して簡潔に記述するため、showメソッドの引数は$idではなくUser $userとします。
    public function show(User $user)
    {
        //
        $user = Auth::user();   #ログインユーザー情報を取得します。
        // ページネーション（1ページに5件表示）
        $user->projects = $user->projects()->paginate(5);
        return view('profile.show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
        $user = Auth::user();   #ログインユーザー情報を取得します。
        // update, destroyでも同様に
        $this->authorize('edit', $user);
        return view('users.edit', ['user' => $user]);
    }
}
