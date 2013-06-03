<?php
/**
 * Declaring class properties or methods as static makes them accessible
 * without needing an instantiation of the class. A property declared as
 * static can not be accessed with an instantiated class object
 * (though a static method can).
 * Static properties may only be initialized using a literal or constant;
 * expressions are not allowed. So while you may initialize a static
 * property to an integer or array (for instance), you may not initialize
 * it to another variable, to a function return value, or to an object.
 */
class foo {
    /**
     * Static properties cannot be accessed through the object using
     * the arrow operator ->.
     * Calling non-static methods statically generates an E_STRICT
     * level warning.
     */
    // declaring a static property
    protected static $bar = NULL;
    // declaring some static method
    public static function setBar($bar)
    {
       /**
        * Because static methods are callable without an instance of the
        * object created, the pseudo-variable $this is not available inside
        * the method declared as static.
        */
        self::$bar = $bar;
    }
    public static function getBar()
    {
        return self::$bar;
    }
}

foo::setBar('test');
echo foo::getBar();

// accessing an static method using the object way
$object = new foo();
$object->setBar('newTest');
echo $object->getBar();
