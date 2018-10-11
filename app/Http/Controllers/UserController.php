<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class UserController extends Controller
{
    // ビューを返す
    public function getSignup(){
        return View('user.signup');
    }

    public function postSignup(Request $request){
        // バリデーション
        $this->validate($request,[
            'spaceid' => 'required|alpha_num|unique:users',
            'organization' => 'required',
            'name' => 'required',
            'email' => 'email|required|unique:users',
            'password' => 'required|alpha_num|min:8'
        ]);

        // DBインサート
        $user = new User([
            'spaceid' => $request->input('spaceid'),
            'organization' => $request->input('organization'),
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password'))
        ]);

        // 保存
        $user->save();

        // リダイレクト
        return redirect()->route('user.profile');
    }

    // ビューを返す
    public function getProfile(){
        return view('user.profile');
    }

    // ビューを返す
    public function getSignin(){
        return view('user.signin');
    }

    // バリデーション⇒認証（attemptメソッド）⇒リダイレクト
    public function postSignin(Request $request){
        $this->validate($request,[
            'email' => 'email|required',
            'password' => 'required|min:8'
        ]);

        if(Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])){
            return redirect()->route('user.profile');
        }
        return redirect()->back();
    }

    // ログアウト
    public function getLogout(){
        Auth::logout();
        return redirect()->route('user.signin');
    }
}
