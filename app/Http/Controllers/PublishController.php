<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Project;

class PublishController extends Controller
{
    //
    public function publish(Request $request, Project $project, $branch_name)
    {
        //
        $project_name = $project->project_name;
        $project_path = get_project_workingtree_dir($project_name, $branch_name);
        $path_current_dir = realpath('.'); // 元のカレントディレクトリを記憶

        chdir($project_path);
        shell_exec('php .px_execute.php /?PX=publish.run');

        chdir($path_current_dir); // 元いたディレクトリへ戻る

        return redirect('projects/' . $project->project_name . '/' . $branch_name)->with('my_status', __('Publish is complete.'));
    }
}
