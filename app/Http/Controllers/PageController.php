<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Page;
use App\Project;

class PageController extends Controller
{
    public function index(Project $project, $branch_name)
    {
        //
        $client_resources_dist = realpath(__DIR__.'/../../../public/assets/px2ce_resources');

        $project_name = $project->project_name;
        $project_path = get_project_workingtree_dir($project_name, $branch_name);
        $path_current_dir = realpath('.'); // 元のカレントディレクトリを記憶
        chdir($project_path);
        $result = shell_exec('php .px_execute.php /index.html?PX=px2dthelper.px2ce.client_resources\&dist='.$client_resources_dist);
        $px2ce_client_resources = json_decode($result, true);
        chdir($path_current_dir); // 元いたディレクトリへ戻る

        return view('pages.index', compact('px2ce_client_resources'));
    }


    public function gpi(Request $request, Project $project, $branch_name)
    {
        //
        $project_name = $project->project_name;
        $project_path = get_project_workingtree_dir($project_name, $branch_name);
        $path_current_dir = realpath('.'); // 元のカレントディレクトリを記憶
        chdir($project_path);
        $result = shell_exec('php .px_execute.php /index.html?PX=px2dthelper.px2ce.gpi\&data='.base64_encode($request->data));
        header('Content-type: text/json');
        echo $result;
        chdir($path_current_dir); // 元いたディレクトリへ戻る
        exit;
    }
}
