<?php

namespace Cliclicli;

class Reader
{
    public function in(array $argv){
        if( $argv[1] ){
            unset($argv[0]);
            return implode(' ', $argv);
        }

        return '';
    }
}