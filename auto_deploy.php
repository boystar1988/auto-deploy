<?php
/**
 * gogs自动部署脚本
 */

//Gogs仓库目录
define("GOGS_REPOSITORY","/data/gogs-repositories/");
//配置目录
$configDir = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR;
//数据流
$json = file_get_contents('php://input');
//日志
$log_file = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'logs' . DIRECTORY_SEPARATOR . time() . '.html';
//部署脚本
$shellPath = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'bin' . DIRECTORY_SEPARATOR. 'auto_deploy.sh';
//处理数据
$info = json_decode($json,true);
//仓库全名
$fullName = $info['repository']['full_name'];
//分支名词
$branch = substr($info['ref'],11);
//配置文件
$configFile = $configDir . $fullName . '.php';
//引入配置文件
$config = require($configFile);
//git信息文件夹
$deployedGit = GOGS_REPOSITORY . $fullName . '.git';
//部署目的位置
$gitDeployPath = $config[$branch]['deploy_path'];
//生成命令
$shell = $shellPath . ' ' . $deployedGit . ' ' . $gitDeployPath . ' ' .  $branch;
//执行
exec($shell);
