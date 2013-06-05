<?php
/**
 * Object interfaces allow you to create code which specifies which methods
 * a class must implement, without having to define how these methods are 
 * handled. Interfaces are defined using the interface keyword, in the same
 * way as a standard class, but without any of the methods having their
 * contents defined.
 * All methods in the interface must be implemented within a class; failure
 * to do so will result in a fatal error. Classes may implement more than
 * one interface if desired by separating each interface with a comma. 
 *
 * NOTE:
 * - a class cannot implement two interfaces that share function names,
 *   since it would cause ambiguity.
 * - Interfaces can be extended like classes using the extends operator.
 * - The class implementing the interface must use the exact same method
 *   signatures as are defined in the interface. Not doing so will result
 *   in a fatal error.
 * - Interface constants works exactly like class constants except they
 *   cannot be overridden by a class/interface that inherits them. 
 */
interface iMan
{
    /**
     * All methods declared in an interface must be public, this is the
     * nature of an interface.
     */
    public function setName($name);
    public function setSName($sName);
    public function setAge($age);
}

/**
 * To implement an interface, the implements operator is used.
 * Use interfaces when the children classes method diverge, have the same
 * name and parameters but diferent implementation
 */
class personA implements iMan 
{
    protected $name  = NULL;
    protected $sName = NULL;
    protected $age   = NULL;
    
    public function setName($name)
    {
        $this->name = 'Person A: '. $name;
    }

    public function setSname($sName)
    {
        $this->sName = 'Person A second name: '. $sName;
    }

    public function setAge($age)
    {
        $this->age = 'Persona A age: '. $age;
    }
}

class personB implements iMan 
{
    
    protected $name  = NULL;
    protected $sName = NULL;
    protected $age   = NULL;
    
    public function setName($name)
    {
        $this->name = 'Person B name is: '. $name;
    }

    public function setSname($sName)
    {
        $this->sName = 'Person B second name is: '. $sName;
    }

    public function setAge($age)
    {
        $this->age = 'Persona B age is: '. $age;
    }
}

$personA = new personA;
$personA->setName('Bar');
$personA->setSName('Baz');
$personA->setAge(34);

var_dump($personA);

$personB = new personB;
$personB->setName('FooBaz');
$personB->setSName('BazFoo');
$personB->setAge(23);

var_dump($personB);
