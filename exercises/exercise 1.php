<?php
/**
 * The problem was found here:
 * http://forum.softpedia.com/topic/502547-concepte-si-design-oop/#entry6008095
 */
class garage
{
    // class property initialization
    private $total_surface = NULL;
    private $total_cars    = array();
    private $colors        = array();
    private $allow_dim     = array(
                                'smin'  =>3,
                                'smax'  =>5,
                                'hmax' =>2
                             );
    
    /**
     * Class constructor used to initialize the garage characteristics
     * @param string $surface the total available area of the garage
     * @param array $cars the number of pre parked cars, empty by default
     * @param array $allow_dim(
                            'smin'  => <value>, min area, def 3m^2
                            'smax'  => <value>, max area, def 5m^2
                            'hmax'  => <value>  max car height, def 2m
                            )
     * @return NULL
     */
    public function __construct($surface, $cars = array(),
                                                $allow_dim = array())
    {
        if(!is_string($surface)) {
            throw new Exception('Parameter $surface must be type string');
        }
        if(!is_array($cars)) {
            throw new Exception('Parameter $cars is not array');
        }
        if(!is_array($allow_dim) || empty($allow_dim)) {
            throw new Exception('Parameter $allow_dim is not array or empty');
        }
        if(!isset($allow_dim['smin'] && !isset($allow_dim['smax']) &&
                                                !isset($allow_dim['hmax'])) {
            throw new Exception('Parameter $allow_dim array geometry is not
            according to signature'); 
        }
       
       $this->total_surface = $surface;
        
        if(!empty($cars)) {
            $this->total_cars = count($cars);
        }
        
        $this->allow_dim = $allow_dim;
    }
    /**
     * setparkcar method used to park a car in the garage
     * @param int $carSurface the area of a parked car
     * @param str $carColor the color of the car that is going to pe parked
     */
    public function setparkcar($carSurface, $carH, $carColor)
    {
        if( $carSurgace >= $this->allow_dim['smin'] && 
            $carSurgace <= $this->allow_dim['smax'] &&
            $carH <= $this->allow_dim['hmax'] ) 
        {
                $this->total_surface = $this->total_surface - $carSurface;
        }
        
        !in_array($carColor, $colors) ? 
                                $colors[$carColor] = 1 : ++$colors[$carColor];
    }
}

class car
{
    private $surface = NULL;
    private $height  = NULL;
    private $color   = NULL;
    /**
     * Class constructor
     */
    public function __construct($car_surface, $car_height, $car_color)
    {
        if(!is_integer($car_surface) || $car_surface < 0) {
            throw new Exception('Parameter $car_surface must be type integer
            and greater then 0');
        }
        if(!is_string($car_color)) {
            throw new Exception('Parameter $car_color must be type string');
        }
        if(!is_integer($car_height) || $car_height < 0) {
            throw new Exception('Parameter $carH must be integer and greater
            then 0');
        }
        $this->height  = $car_height;
        $this->surface = $car_surface;
        $this->color   = $car_color;
    }
    // class getters
    public function getSurface()
    {
        return $this->surface;
    }
    public function getColor()
    {
        return $this->color;
    }
    public function getHeight()
    {
        return $this->height;
    }
}


