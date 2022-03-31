<?php

namespace Cliclicli\App;

use Cliclicli\Writer;
use Cliclicli\Reader;
use Cliclicli\Str;
use Cliclicli\CsvMaker;

class App
{
    protected $input, $writer, $reader, $str;

    public function __construct(array $argv){
        $this->writer = new Writer();
        $this->reader = new Reader();
        $this->str = new Str();
        $this->csv = new CsvMaker();

        $this->setInput($argv);

    }
    public function setInput(array $argv){
        $this->input = $this->reader->in($argv);
    }
    public function getInput(){
        return $this->input;
    }
    public function makeUpLine(){
        return $this->str->upCase($this->getInput());
    }
    public function makeUpLoLine(){
        $total = strlen($this->getInput());
        $ret = '';
        for($i=0;$i<$total;$i+=2){
            $ret.= $this->str->lowCase($this->getInput()[$i]);
            if( $i+1 < $total ) {
                $ret.= $this->str->upCase($this->getInput()[$i+1]);
            }
        }
        return $ret;
    }
    public function prepareForCSV(){
        return implode( ',', str_split( $this->getInput() ) );
    }
    public function createCSV(){
        if( $this->csv->csvCreate("out.csv", $this->prepareForCSV()) ){
            return true;
        }

        return false;
    }
    public function start(){
        $this->writer->out( $this->makeUpLine() );

        $this->writer->newline();

        $this->writer->out( $this->makeUpLoLine() );

        $this->writer->newline();

        if( $this->createCSV() ){
            $this->writer->out( "CSV created!" );
        }else{
            $this->writer->out( "CSV NOT created :(" );
        }


    }

}