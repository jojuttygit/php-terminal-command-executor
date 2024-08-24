<?php
namespace PHPTerminalCommandExecutor\Controllers\GitControllers;

require 'GitController.php';
require __DIR__ . '/../../traits/MessageTrait.php';

use PHPTerminalCommandExecutor\Controllers\GitControllers\GitController;
use PHPTerminalCommandExecutor\traits\MessageTrait;
use PHPTerminalCommandExecutor\Helpers;

/**
 * Customized git pipeline operations 
 * File migrations
 */
Class ExecuteGitController extends  GitController {
    use MessageTrait;
    private $target_branch = null;
    private $source_branch = null;
    private $files = [];
    private $restricted_branches = [];
    private $commit_message = '';
    public function __construct() 
    {
        $config = require(__DIR__ . '/../../configs/git.php');
        $this->target_branch = $config['target_branch'];
        $this->source_branch = $config['source_branch'];
        $this->files = $config['migration_files'];
        $this->restricted_branches = $config['restricted_branches'];
        $this->commit_message = $config['commit_message'];
    }

    /**
     * Execute terminal commands
     * @param string $command
     * @param boolean $return
     * @return void|string
     */
    private function execute($command, $return = false) 
    {
        $output = [];
        $returnVar = 0;
        
        exec($command, $output, $returnVar);

        if ($returnVar !== 0) {
            $this->errorText("**Execution stopped output**". PHP_EOL . implode("\n", $output));
            exit;
        }

        if ($return) {
            if (isset($output[0])) {
                return $output[0] . PHP_EOL;
            }
        }
    }

    /**
     * Confirm if we need to proceed execution based on user input
     * @param string $message
     * @param string $expected_input
     * @return void
     */
    private function checkProceedExecution($message, $expected_input = 'yes') 
    {
        $user_input = Helpers::prompt($message);

        if ($user_input != $expected_input) {
            $this->infoText('Execution Stopped. Thank you!');
            exit;
        }
    }

    /**
     * Validate source and target git branch
     * @return void
     */
    private function validateBranches()
    {
        if (empty($this->target_branch) || empty($this->source_branch)) {
            $this->errorText('Target or source branch required');
            exit;
        }

        if (empty($this->execute($this->isBranchExistInLocal($this->target_branch), true))) {
            $this->errorText("$this->target_branch not exist");
            exit;
        } 

        if (empty($this->execute($this->isBranchExistInLocal($this->source_branch), true))) {
            $this->errorText("$this->source_branch not exist");
            exit;
        } 
        
        if (in_array($this->target_branch, $this->restricted_branches)) {
            $this->errorText("$this->target_branch is a resticted branch");
            exit;
        }
    }

    /**
     * Validate migration files
     * @return void
     */
    private function validateAndConfirmFiles()
    {
        if (empty($this->files)) {
            $this->errorText('No files to migrate');
            exit;
        }

        foreach ($this->files as $file) {
            $this->warningText(" -> $file " . PHP_EOL);
        }

        $this->checkProceedExecution("Check files and type ok to proceed : ", 'ok');
    }

    /**
     * Migrate files from one branch to another
     * @return void
     */
    public function fileMigration()
    {
        $this->validateBranches();
        $this->validateAndConfirmFiles();
        $migration_counter = 0;

        $this->execute($this->branchCheckout($this->target_branch));
        //echo $this->execute($this->gitStatus(), true);
        $this->checkProceedExecution("Check current branch and type yes to proceed file migration : ");
        $this->execute($this->gitPull($this->target_branch));

        foreach ($this->files as $file) {
            sleep(1);
            $file_path = $file . " " . $file;
            $this->execute($this->fileMigrationBetweenBranches($this->source_branch, $file_path));
            $this->execute($this->addFile($file_path));
            $this->successText("$file migrated to $this->target_branch");
            $migration_counter++;
        }

        sleep(1);

        $this->execute($this->gitCommit($this->commit_message));
        echo PHP_EOL;
        $this->infoText("Total Files: " . count($this->files));
        $this->infoText("Migrated Files: $migration_counter");
    }
}