<?php

namespace Cliclicli;

class CsvMaker
{
    public function csvCreate($filename, $data){
        if( file_put_contents($filename, $data) ){
            return true;
        }

        return false;
    }
}