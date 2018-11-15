<?php

use Illuminate\Contracts\Console\Kernel;

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
    return view('top');
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('users', 'UserController@index');
Route::get('users/create', 'UserController@create');
Route::post('users', 'UserController@store');
Route::get('users/{user}', 'UserController@show');
Route::get('users/{user}/edit', 'UserController@edit');
Route::put('users/{user}', 'UserController@update');
Route::delete('users/{user}', 'UserController@destroy');

// Route::resource('users', 'UserController');

Route::get('projects', 'ProjectController@index');
Route::get('projects/create', 'ProjectController@create');
Route::post('projects', 'ProjectController@store');
Route::get('projects/{project}', 'ProjectController@show');
Route::get('projects/{project}/edit', 'ProjectController@edit');
Route::put('projects/{project}', 'ProjectController@update');
Route::delete('projects/{project}', 'ProjectController@destroy');

// Route::resource('projects', 'ProjectController');

Route::get('pages', 'PageController@index');
