<?php

require_once('fooclass.php');

class fooMethodsTest extends PHPUnit_Framework_TestCase
{   
    /**
     * @dataProvider provider
     */
    public function testBazParameter($param)
    {
        $foo = new foo();
        $this->assertTrue($foo->baz($param));
    }

    public function provider()
    {
        return array(array('baz'), array(null), array(1), array(TRUE), array(FALSE), array(0));
    }
}
