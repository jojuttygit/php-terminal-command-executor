<?php

namespace PHPTerminalCommandExecutor\traits;
trait MessageTrait {
    public function successText($message)
    {
        echo "\033[32m $message \033[0m\n";
    }

    public function errorText($message)
    {
        echo "\033[31m $message \033[0m\n";
    }

    public function warningText($message)
    {
        echo "\033[33m $message \033[0m";
    }

    public function infoText($message)
    {
        echo "\033[1;36m $message \033[0m\n";
    }
}