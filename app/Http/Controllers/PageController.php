<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Page;
use App\Project;

class PageController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = Auth::user()->id;
        $bd_project_path = Project::where('user_id', $user)->value('project_path');
        chdir($bd_project_path);
        $bd_json = shell_exec('php .px_execute.php /?PX=px2dthelper.get.all');
        $bd_object = json_decode($bd_json);

        return view('pages.index', compact('bd_object'));
    }
}
