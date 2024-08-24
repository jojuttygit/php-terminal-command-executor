<?php

namespace PHPTerminalCommandExecutor\traits;
trait MessageTrait {

    /**
     * Green terminal output
     * @param string $message
     * @return void
     */
    public function successText($message)
    {
        echo "\033[32m $message \033[0m\n";
    }

    /**
     * Red terminal output
     * @param string $message
     * @return void
     */
    public function errorText($message)
    {
        echo "\033[31m $message \033[0m\n";
    }

    /**
     * Yellow terminal output
     * @param string $message
     * @return void
     */
    public function warningText($message)
    {
        echo "\033[33m $message \033[0m";
    }

    /**
     * Information text output
     * @param string $message
     * @return void
     */
    public function infoText($message)
    {
        echo "\033[1;36m $message \033[0m\n";
    }
}