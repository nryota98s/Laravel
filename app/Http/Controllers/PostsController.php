<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{
    // 投稿一覧
    public function index()
    {
        $list = DB::table('posts')->get();
        return view('main', ['list' => $list]);
    }
    // 投稿の追加のためのページ
    public function createForm()
    {
        return view('createForm');
    }
    // 投稿の追加
    public function create(Request $request)
    {
        $this->validate($request, [
            'userName' => ['required', 'regex:/^[^　\s]+$/u', 'string', 'max:255'],
            'newPost' => ['required', 'regex:/^[^　\s]+$/u', 'string', 'max:100'],
        ]);





        $name = $request->input('userName');
        $post = $request->input('newPost');


        DB::table('posts')->insert([

            'user_name' => $name,
            'contents' => $post
        ]);
        return redirect('/main');
    }


    // 投稿の変更のためのページ
    public function updateForm($id)
    {

        $posts = DB::table('posts')

            ->where('id', $id)

            ->first();

        return view('updateForm', ['post' => $posts]);

    }

    // 投稿の変更
    public function update(Request $request)
    {
        $this->validate($request, [
            'userName' => ['required', 'regex:/^[^　\s]+$/u', 'string', 'max:255'],
            'upPost' => ['required', 'regex:/^[^　\s]+$/u', 'string', 'max:100'],
        ]);
        $name = $request->input('userName');
        $id = $request->input('id');
        $up_post = $request->input('upPost');

        DB::table('posts')
            ->where('id', $id)
            ->update(
                [
                    'contents' => $up_post,
                    'user_name' => $name
                ]
            );
        return redirect('main');
    }

    // 投稿の削除
    public function delete($id)
    {
        DB::table('posts')
            ->where('id', $id)
            ->delete();
        return redirect('main');
    }
    // 検索機能
    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        if (!empty($keyword)) {
            $list = DB::table('posts')
                ->where('contents', 'LIKE', "%{$keyword}%")
                ->get();
            return view('main', ['list' => $list]);
        } else {
            $list = DB::table('posts')->get();
            return view('main', ['list' => $list]);
        }



    }

}
