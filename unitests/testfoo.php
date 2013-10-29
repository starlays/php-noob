<?php

require_once('fooclass.php');

class fooMethodsTest extends PHPUnit_Framework_TestCase
{
    public function testBazParameter()
    {
        $foo = new foo();
        $this->assertTrue($foo->baz('bar'));
    }
}
