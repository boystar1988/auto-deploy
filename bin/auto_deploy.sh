#!/bin/bash
deployedGit=$1
gitDeployPath=$2
branch=$3

if [ ! -d $gitDeployPath ]
echo '目录不存在 或者 权限不足'
then
        cd $gitDeployPath
        git clone -b $branch $deployedGit .
fi
cd $gitDeployPath
git fetch --all
git reset --hard origin/$branch