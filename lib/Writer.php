<?php

namespace Cliclicli;

class Writer
{
    public function out($message)
    {
        echo $message;
    }

    public function newline()
    {
        $this->out("\n");
    }
}