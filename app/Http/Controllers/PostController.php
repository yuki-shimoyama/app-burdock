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

        $bd_data_dir = env('BD_DATA_DIR');
        $project_name = 'project_'.$post->title;
        $projects_name = 'projects';
        $branchs_name = 'branches';
        $branch_name = 'master';
        $git_url = $post->body;

        if (!is_dir($bd_data_dir)) {
            mkdir($bd_data_dir);
        }
        chdir($bd_data_dir);

        if (!is_dir($projects_name)) {
            mkdir($projects_name);
        }
        chdir($projects_name);

        if (!is_dir($project_name)) {
            mkdir($project_name);
        }
        chdir($project_name);

        if (!is_dir($branchs_name)) {
            mkdir($branchs_name);
        }
        chdir($branchs_name);

        $path_composer = realpath(__DIR__.'/../../common/composer/composer.phar');
        shell_exec($path_composer . ' create-project pickles2/preset-get-start-pickles2 ./' . $branch_name);
        chdir($branch_name);

        shell_exec('git init');
        shell_exec('git add -A');
        shell_exec('git commit -m "Create project"');
        shell_exec('git remote add origin ' . $git_url);
        shell_exec('git push origin master');

        return redirect('posts/' . $post->id)->with('my_status', __('Created new Project.'));
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
        return redirect('posts/' . $post->id)->with('my_status', __('Updated an Project.'));
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
        return redirect('posts')->with('my_status', __('Deleted an Project.'));
    }
}
