<?php
/**
 * PHP 5 introduces abstract classes and methods. Classes defined as abstract
 * may not be instantiated, and any class that contains at least one abstract
 * method must also be abstract. Methods defined as abstract simply declare the
 * method's signature - they cannot define the implementation. 
 * When inheriting from an abstract class, all methods marked abstract in the
 * parent's class declaration must be defined by the child; additionally, these
 * methods must be defined with the same (or a less restricted) visibility.
 * Furthermore the signatures of the methods must match, i.e. the type hints
 * and the number of required arguments must be the same. For example, if the
 * child class defines an optional argument, where the abstract method's 
 * signature does not, there is no conflict in the signature. This also applies
 * to constructors.
 * In PHP 5, abstract classes are tested when  they are parsed, which is much safer.
 * Some clearance informations:
 * http://stackoverflow.com/questions/16918222/oop-abstract-classes-when-to-implement-abstract-methods
 */
abstract class concept_car {
    /**
     * Properties can not be declared as abstract natively:
     * http://stackoverflow.com/questions/7634970/php-abstract-properties
     */
    protected $weelNum  = NULL;
    protected $doorsNum = NULL;
    protected $color    = NULL;
    protected $model     = NULL;
    // the inheritance class must define this methods
    public function setCarDetails($weelNum, $doorsNum, $color)
    {
        $this->weelNum  = $weelNum; 
        $this->doorsNum = $doorsNum;
        $this->color    = $color;
    }
    
    abstract public function setModel($model);

    abstract public function getModel();
}

// using the abstract class for a car concept "materialization"
class bmw extends concept_car {

    public function setModel($model)
    {
        $this->model = $model;
    }

    public function getModel()
    {
        return $this->model;
    }
}

$object = new bmw();
$object->setModel('Z3');
echo $object->getModel();
