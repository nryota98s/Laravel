<?php

use Illuminate\Support\Facades\Route;

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
    return view('auth/login');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// 投稿一覧ページ
Route::get('/main', 'PostsController@index');
// 投稿の追加のためのページ
Route::get('create-form', 'PostsController@createForm');
// 投稿の追加
Route::post('/post/create', 'PostsController@create');
// 投稿の変更のためのページ
Route::get('post/{id}/update-form', 'PostsController@updateForm');
// 投稿の変更
Route::post('/post/update', 'PostsController@update');
// 投稿の削除のためのページ
Route::get('post/{id}/delete', 'PostsController@delete');
// 検索機能
Route::post('/main', 'PostsController@search');
