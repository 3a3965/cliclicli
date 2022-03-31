<?php

namespace Cliclicli;

class Str
{
    public function upCase($string){
        return mb_strtoupper($string,'UTF-8');
    }

    public function lowCase($string){
        return mb_strtolower($string,'UTF-8');
    }
}