<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// user
Route::group(['prefix' => 'user'], function() {

        // ユーザープロファイル
        Route::get('/profile',[
            'uses' => 'UserController@getProfile',
            'as' => 'user.profile'
        ]);
        // ログアウト
        Route::get('/logout',[
            'uses' => 'UserController@getLogout',
            'as' => 'user.logout'
        ]);

        // 登録
        Route::get('/signup',[
            'uses' => 'UserController@getSignup',
            'as' => 'user.signup'
        ]);
        Route::post('/signup',[
            'uses' => 'UserController@postSignup',
            'as' => 'user.signup'
        ]);
        // ログイン
        Route::get('/signin',[
            'uses' => 'UserController@getSignin',
            'as' => 'user.signin'
        ]);
        Route::post('/signin',[
            'uses' => 'UserController@postSignin',
            'as' => 'user.signin'
        ]);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
