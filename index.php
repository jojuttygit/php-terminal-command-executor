<?php

require 'Helpers.php';
require 'Controllers/GitControllers/ExecuteGitController.php';

use PHPTerminalCommandExecutor\Helpers;
use PHPTerminalCommandExecutor\Controllers\GitControllers\ExecuteGitController;

/**
 * Load listed services and allow the users to choose one service.
 * @return void
 */
function boot() {
    echo PHP_EOL;
    echo "*******************" . PHP_EOL;
    echo "PHP Terminal Command Executor" . PHP_EOL;
    echo "*******************" . PHP_EOL;
    echo PHP_EOL;
    echo "1. Git Command Executor" . PHP_EOL;
    echo "2. Laravel Command Executor" . PHP_EOL;
    echo PHP_EOL;
    
    $user_input = Helpers::prompt("Please provide an input : "); 
    
    /** git command service*/
    if ($user_input == 1) {
        $object = new ExecuteGitController();
        $object->fileMigration();
    } else {
        echo "Development in progress..Thank you";
        exit;
    }
}

boot();