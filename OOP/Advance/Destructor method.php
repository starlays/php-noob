<?php
/**
 * PHP 5 introduces a destructor concept similar to that of other object-oriented
 * languages, such as C++. The destructor method will be called as soon as there
 * are no other references to a particular object, or in any order during the
 * shutdown sequence.
 * Like constructors, parent destructors will not be called implicitly by the
 * engine. In order to run a parent destructor, one would have to explicitly
 * call parent::__destruct() in the destructor body. Also like constructors, a
 * child class may inherit the parent's destructor if it does not implement one
 * itself. 
 */
class baz
{
    private $name;
    private $age;
    private $dayCost;

    public function __construct($name, $age)
    {
        $this->name = $name;
        $this->age  = $age;
    }

    public function setDayCost($dayCost)
    {
        if(!empty($this->dayCost))
        $this->dayCost = $dayCost;
    }

    public function __destruct()
    {
        return $this->dayCost;
    }
}

$object = new baz('John', 29);
$object->setDayCost(300);
unset($object);

$object_1 = new baz('Dany', 31);
$object_1->setDayCost(340);
