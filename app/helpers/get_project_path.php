<?php

function getProjectPath($project_name, $branch_name) {
    $project_path = env('BD_DATA_DIR') . "/" . "projects" . "/" . "project_" . $project_name . "/" . "branches" . "/" . $branch_name;
    return $project_path;
}
