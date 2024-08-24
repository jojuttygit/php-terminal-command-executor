<?php

namespace PHPTerminalCommandExecutor\Controllers\GitControllers;

/**
 * Handle git commands
 */
Class GitController {

    /**
     * Checkout to a branch
     * @param string $branch
     * @return string
     */
    protected function branchCheckout($branch) 
    {
        return "git checkout $branch";
    }

    /**
     * Show git status
     * @return string
     */
    protected function gitStatus() 
    {
        return "git status";
    }

    /**
     * Copy file from one branch to another
     * @param string $source_branch
     * @param string $file_path
     * @return string
     */
    protected function fileMigrationBetweenBranches($source_branch, $file_path)
    {
        return "git checkout $source_branch -- $file_path";
    }
    
    /**
     * Add files to git
     * @param string $file_path
     * @return string
     */
    protected function addFile($file_path)
    {
        return "git add $file_path";
    }

    /**
     * Commit changes with a commit message
     * @param string $message
     * @return string
     */
    protected function gitCommit($message)
    {
        return "git commit -m \"$message\"";
    }

    /**
     * Confirm a branch exist locally
     * @param string $branch
     * @return string
     */
    protected function isBranchExistInLocal($branch)
    {
        return "git branch --list $branch";
    }

    /**
     * Update/pull current branch
     * @param string $branch
     * @return string
     */
    protected function gitPull($branch)
    {
        return "git pull origin $branch";
    }

    /**
     * Push changes to remote
     * @param string $branch
     * @return string
     */
    protected function pushChanges($branch)
    {
        return "git push origin $branch";
    }
}