<?php
return [
    /**
     * @example
     * "分支名"=>[
     *  "deploy_path" => "自动部署路径"
     * ]
     */

    'develop'=>[
        'deploy_path'=>'/data/www/project',
    ],
    'release'=> [
        'deploy_path'=>'/data/www/project/release'
    ]
];