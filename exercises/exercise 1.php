<?php
/**
 * The problem was found here:
 * http://forum.softpedia.com/topic/502547-concepte-si-design-oop/#entry6008095
 */

interface Icar {
    public function getSurface();
    public function getColor();
    public function getHeight();
}

class garage
{
    /**
     * @var int $totalSurface holder of the garage total available area
     */
    private $totalSurface = 0;
    /**
     * @var int totalCars holder of the total parked cars
     */
    private $totalCars    = 0;
    /**
     * @var mixed $colors how many cars of eatch colors are parked in the
     * garage
     */
    private $colors        = array();
    /**
     * @var mixed $allowDim maximum and minimum dimensions allowed for a car
     * that will be parked in the garage
     */
    private $allowDim     = array(
                                'smin' =>3,
                                'smax' =>5,
                                'hmax' =>2
                             );

    /**
     * Class constructor used to initialize the garage characteristics
     * @param string $surface the total available area of the garage
     * @param array $cars the number of pre parked cars, empty by default
     * @param array $allowDim(
     *                      'smin' => <value>, min area, def 3m^2
     *                      'smax' => <value>, max area, def 5m^2
     *                      'hmax' => <value>  max car height, def 2m
     *                      )
     * @return null
     */
    public function __construct($surface, $cars = array(), $allowDim = array())
    {
        if(!is_string($surface)) {
            throw new Exception('Parameter $surface must be type string');
        }
        if(!is_array($cars)) {
            throw new Exception('Parameter $cars is not array');
        }
        if(!is_array($allowDim) || empty($allowDim)) {
            throw new Exception('Parameter $allowDim is not array or empty');
        }
        if(!isset($allowDim['smin']) && !isset($allowDim['smax']) &&
                                                !isset($allowDim['hmax'])) {
            throw new Exception('Parameter $allowDim array geometry is not
            according to signature');
        }

       $this->totalSurface = $surface;

        if(!empty($cars)) {
            $this->totalCars = count($cars);
        }

        $this->allowDim = $allowDim;
    }
    /**
     * setParkCar method used to park a car in the garage
     * @param int $carSurface the area of a parked car
     * @param str $carColor the color of the car that is going to pe parked
     * @return bool if the car was parked or not
     */
    public function setParkCar(Icar $car)
    {
        if( $car->surface >= $this->allowDim['smin'] &&
            $car->surface <= $this->allowDim['smax'] &&
            $car->height <= $this->allowDim['hmax'] )
        {
            $this->totalSurface = $this->totalSurface - $car->surface;
            !in_array($car->color, $this->colors) ?
                  $this->colors[$car->color] = 1 : ++$this->colors[$car->color];
            return TRUE;
        }
        return FALSE;
    }
}

class car
{
    /**
     * @var int $surface the area that a car occupies
     */
    private $surface = 0;
    /**
     * @var int $height the height of the car
     */
    private $height  = 0;
    /**
     * @var string $color the color of the car
     */
    private $color   = NULL;
    /**
     * Class constructor used to initialize an car object
     * @param int $carSurface the area that the parked will take
     * @param int $carHeight the heigth of the car
     * @param str $carColor the color of the car that will be parked
     * @retunr NULL
     */
    public function __construct($carSurface, $carHeight, $carColor)
    {
        if(!is_integer($carSurface) || $carSurface < 0) {
            throw new Exception('Parameter $carSurface must be type integer
            and greater then 0');
        }
        if(!is_string($carColor)) {
            throw new Exception('Parameter $carColor must be type string');
        }
        if(!is_integer($carHeight) || $carHeight < 0) {
            throw new Exception('Parameter $carH must be integer and greater
            then 0');
        }
        $this->height  = $carHeight;
        $this->surface = $carSurface;
        $this->color   = $carColor;
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
