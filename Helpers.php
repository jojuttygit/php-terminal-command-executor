<?php

namespace PHPTerminalCommandExecutor;
Class Helpers {
    public static function prompt($message)
    {
        echo "$message";
        return strtolower(trim(fgets(STDIN)));
    }
}