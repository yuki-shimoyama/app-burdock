<?php
/**
 * Gitリモートサーバーからデフォルトのブランチ名を取得する
 */
function get_git_remote_default_branch_name( $git_url = null ) {
    $default = 'master';
    if( !strlen( $git_url ) ){
        return $default;
    }
    $result = shell_exec('git ls-remote --symref '.escapeshellarg($git_url).' HEAD');
    if(!is_string($result) || !strlen($result)){
        return $default;
    }

    if( !preg_match('/^ref\: refs\/heads\/([^\s]+)\s+HEAD/', $result, $matched) ){
        return $default;
    }

    return $matched[1];
}
