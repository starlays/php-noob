<?php

class Foo {
    private $bar = NULL;
    /**
     * Classes which have a constructor method call this method on each
     * newly-created object, so it is suitable for any initialization that
     * the object may need before it is used.
     */
    function __construct($bar)
    {
        $this->bar = $bar;
    }
    //getter
    function get_bar() 
    {
        return $this->bar;
    }
}

// Creating an object type Foo, forcing the poperty set on instantiation 
$object = new Foo('baz');
// Getting the value of $var from object
echo $object->get_bar();
