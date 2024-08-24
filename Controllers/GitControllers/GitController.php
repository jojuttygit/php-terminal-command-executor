<?php

namespace PHPTerminalCommandExecutor\Controllers\GitControllers;

/**
 * Handle git commands
 */
Class GitController {
    protected function branchCheckout($branch) 
    {
        return "git checkout $branch";
    }

    protected function gitStatus() 
    {
        return "git status";
    }

    protected function fileMigrationBetweenBranches($source_branch, $file_path)
    {
        return "git checkout $source_branch -- $file_path";
    }

    protected function addFile($file_path)
    {
        return "git add $file_path";
    }

    protected function gitCommit($message)
    {
        return "git commit -m \"$message\"";
    }

    protected function isBranchExistInLocal($branch)
    {
        return "git branch --list $branch";
    }

    protected function gitPull($branch)
    {
        return "git pull origin $branch";
    }
}