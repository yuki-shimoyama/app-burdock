<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post; // Postモデルをインポートする
use App\Http\Requests\StorePost;

class PostController extends Controller
{
    /**
     * 各アクションの前に実行させるミドルウェア
     */
    public function __construct()
    {
        // ログインしなくても閲覧だけはできるようにexcept()で指定します。
        // $this->middleware('auth')->except(['index', 'show']);
        $this->middleware('verified')->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // 1. 新しい順に取得できない
        // $posts = Post::all();

        // 2. 記述が長くなる
        // $posts = Post::orderByDesc('created_at')->get();

        // 3. latestメソッドがおすすめ
        // ページネーション（1ページに5件表示）
        $posts = Post::latest()->paginate(5);
        // Debugbarを使ってみる
        \Debugbar::info($posts);
        return view('posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     * 新しい記事を保存する
     * @param  \App\Http\Requests\StorePost $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePost $request)
    {
        //
        $post = new Post;
        $post->title = $request->title;
        $post->body = $request->body;
        // 記事作成時に著者のIDを保存する
        $post->user_id = $request->user()->id;
        $post->save();
        return redirect('posts/'.$post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
        return view('posts.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
        // update, destroyでも同様に
        $this->authorize('edit', $post);
        return view('posts.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     * 記事の更新を保存する
     * @param  \App\Http\Requests\StorePost $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StorePost $request, Post $post)
    {
        //
        $this->authorize('edit', $post);
        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();
        return redirect('posts/' . $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
        $this->authorize('edit', $post);
        $post->delete();
        return redirect('posts');
    }
}
