<?php
/**
 * The problem was found here:
 * http://forum.softpedia.com/topic/502547-concepte-si-design-oop/#entry6008095
 */
class garage
{
    // class property initialization
    private $total_surface   = NULL;
    private $total_cars      = array();
    private $colors          = array()
    private $available_space = NULL;
    
    /**
     * Class constructor used to initialize the garage characteristics
     * @param string $surface the total available area of the garage
     * @param array $cars the number of pre parked cars, empty by default
     * @return NULL
     */
    public function __construct($surface, $cars = array())
    {
        if(!is_string($surface)) {
            throw new Exception('Parameter $surface must be type string');
        }
        if(!is_array($cars)) {
            throw new Exception('Parameter $cars is not array');
        }
        if(!empty($cars)) {
            $this->total_cars = $cars;
        }
        $this->total_surface = $surface;
    }
    /**
     * setparkcar method used to park a car in the garage
     * @param int $carSurface the area of a parked car
     * @param str $carColor the color of the car that is going to pe parked
     */
    public function setparkcar($carSurface, $carColor)
    {
        if(!is_string($carSurface) || $carSurface < 0) {
            throw new Exception('Parameter $carSurface must be type integer and
                                 greater then 0');
        }
        if(!is_array($carColor)) {
            throw new Exception('Parameter $carColor must be type string');
        }
        $this->total_surface = $this->total_surface - $carSurface;
        !in_array($carColor, $colors) ? 
                                $colors[$carColor] = 1 : ++$colors[$carColor];
        }
    }
}

class car
{
    private $Surface = NULL;
    private $Color   = NULL;
    
    public function __construct($car_surface, $car_color)
    {
        $this->Surface = $car_surface;
        $this->Color   = $car_color;
    }

    public function getSurface()
    {
        return $this->Surface;
    }
    public function getColor()
    {
        return $this->Color;
    }
}
