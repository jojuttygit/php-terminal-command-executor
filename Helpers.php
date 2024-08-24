<?php

namespace PHPTerminalCommandExecutor;
Class Helpers {

    /**
     * Prompt a message and accept user input from terminal
     * @param string $message
     * @return string
     */
    public static function prompt($message)
    {
        echo "$message";
        return strtolower(trim(fgets(STDIN)));
    }
}