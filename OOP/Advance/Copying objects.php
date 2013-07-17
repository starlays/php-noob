<?php
/**
 * When an object is cloned, PHP 5 will perform a shallow copy of all of the
 * object's properties. Any properties that are references to other variables,
 * will remain references
 *
 *void __clone ( void )
 * 
 * Once the cloning is complete, if a __clone() method is defined, then the
 * newly created object's __clone() method will be called, to allow any
 * necessary properties that need to be changed. 
 */
class SubObject
{
   public static  $instances = 0;
   public $instance;

    public function __construct()
    {
        $this->instance = ++self::$instances;
    }
    
    public function __clone()
    {
        $this->instance = ++self::$instances;
    }
}

class MyClonable
{
    public $object1 = NULL;
    public $object2 = NULL;

    public function __clone()
    {
        // Force a copy of this->object, otherwise
        // it will point to same object.
        $this->object1 = clone $this->object1;
    }
}

$obj = new MyClonable();

$obj->object1 = new SubObject();
$obj->object2 = new SubObject();

$obj2 = clone $obj;

var_dump('Original object:', $obj);

var_dump('Cloned object:', $obj2);
