<?php
namespace Cliclicli\App;

use PHPUnit\Framework\TestCase;

class AppTest extends TestCase
{
    public function testCanGetInput()
    {
        $inp = array( 1 => 'lalala' );
        $app = new App( $inp );

        $this->assertEquals($app->getInput(),'lalala');
    }

    public function testUpString()
    {
        $inp = array( 1 => 'lalala' );
        $app = new App( $inp );

        $this->assertEquals($app->makeUpLine(),'LALALA');
    }

    public function testUpLoString()
    {
        $inp = array( 1 => 'lalala' );
        $app = new App( $inp );

        $this->assertEquals($app->makeUpLoLine(),'lAlAlA');
    }

    public function testCsvData()
    {
        $inp = array( 1 => 'lalala' );
        $app = new App( $inp );

        $this->assertEquals($app->prepareForCSV(),'l,a,l,a,l,a');
    }

    public function testCsvFile()
    {
        $inp = array( 1 => 'lalala' );
        $app = new App( $inp );

        $this->assertTrue($app->createCSV());
    }


    public function testClassConstructor()
    {
        $app = new App( array( 1 => "Here is the test string!") );
        $app->start();
    }
}