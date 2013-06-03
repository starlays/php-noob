<?php

// defining a general type car
class car {

    // setting the properties
    protected $color          = NULL;
    protected $wheelDimension = NULL;
    protected $fuel           = NULL;

    // setting the methedos
    public function __construct($color, $wheelDimension, $fuel)
    {
        $this->color          = $color;
        $this->wheelDimension = $wheelDimension;
        $this->fuel           = $fuel;
    } 

}


/**
 * defining an specific car type that has the same
 * specification as the general type car
 */
class ModelA extends car {

    private $car_model  = NULL;
    private $horsepower = NULL;
    
    /**
     * - because we are using constructor from car parent class we are responsable
     *   for the passing of the parameters
     * - inherited constructor must have the same level of visibiliti or weaker than
     *   the parrent class
     */
    public function __construct($color, $wheelDimesion, $fuel,
                                        $car_model, $horsepower)
    {
        /**
         * To refer to a method in the context of a class rather than
         * an object you use :: rather than ->
         */
        parent::__construct($color, $wheelDimension,$fuel);
        $this->car_model  = $car_model;
        $this->horsepower = $horsepower;
    }
    public function getModel()
    {
        return $this->car_model;
    }

    public function getHorsepower()
    {
        return $this->horsepower;
    }
}

// ---
// Some tests
// ---
$general_car = new car('red', 17, 'diesel');
var_dump($general_car);

$modelA_car  = new ModelA('red', 17, 'gasoline', 'ModelA', 400);
var_dump($modelA_car);
echo 'The car model is: ', $modelA_car->getModel(), ' that has the horsepower: ', $modelA_car->getHorsepower(), ' hp';
