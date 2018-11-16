<?php
/**
 * プロジェクトのブランチ別ワーキングツリーのパスを取得する
 */
function getProjectPath($project_name, $branch_name) {
    $project_path = env('BD_DATA_DIR').'/projects/project_'.urlencode($project_name).'/branches/'.urlencode($branch_name);
    return $project_path;
}
