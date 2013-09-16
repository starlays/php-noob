<?php
/**
 * The problem was found here:
 * http://forum.softpedia.com/topic/502547-concepte-si-design-oop/#entry6008095
 */

/**
 * Interface Parkable used for type parkable class implementation
 */
interface Parkable {
    /**
     * setWidth (str $width) method used to set parkable widht
     * 
     * @param int $width the width of parkable object
     * @return null
     */
    public function setWidth($width);
    /**
     * setHeight (str $height) method used to set parkable height
     * 
     * @param int $height the height of parkable object
     * @return null
     */
    public function setHeight($height);
    /**
     * setLenght (str $length) method used to set parkable length
     * 
     * @param int $length the length of parkable object
     * @return null
     */
    public function setLenght($length);
    /**
     * setIsParked (str $isParked) method used to set parkable parked state
     * 
     * @param bool $isParked the parked state of the parkable object
     * @return null
     */
    public function setIsParked($isParked);
    /**
     * getWidth() method used to get the width
     * @return null
     */
    public function getWidth();
    /**
     * getHeight() method used to get the height
     * @return null
     */
    public function getHeight();
    /**
     * getLength() method used to get the length
     * @return null
     */
    public function getLength();
    /**
     * getSurface() method used to get the area of the parkable object
     * @return null
     */
    public function getSurface();
    /**
     * getParkState() method used to get parkable state (parked or nod)
     * @return null
     */
    public function getParkState();
}
/**
 * Interface Parkplace used for type parkplace class implementation
 */
interface Parkplace {
    /**
     * setTotalSurface(int $totalSurface) method used to set parkplace surface
     * 
     * @param int $totalSurface
     * @return null
     */
    public function setTotalSurface($totalSurface);
     /**
     * setAllowDim(array $allowDim) method used to set the maxium dimensions
     * allowd in to the parkplace
     * 
     * @param type $allowDim
     * @return null 
     */
    public function setAllowDim($allowDim = array());
    /**
     * getAvailableSurface() method used to get the availale surface left in
     * the parkplace
     * 
     * @return null
     */
    public function getAvailableSurface();
}

class garage implements Parkplace
{
    /**
     * @var int $totalSurface holder of the garage total available area
     */
    protected $totalSurface = 0;
    /**
     * @var int totalCars holder of the total parked cars
     */
    protected $totalCars    = 0;
    /**
     * @var mixed $colors how many cars of eatch colors are parked in the
     * garage
     */
    protected $colors       = array();
    /**
     * @var mixed $allowDim maximum and minimum dimensions allowed for a car
     * that will be parked in the garage
     */
    protected $allowDim     = array(
                                'smin' =>3,
                                'smax' =>5,
                                'hmax' =>2
                             );

    /**
     * 
     * @param string $surface the total available area of the garage
     * @param array $cars the number of pre parked cars, empty by default
     * @param array $allowDim(
     *                      'smin' => <value>, min area, def 3m^2
     *                      'smax' => <value>, max area, def 5m^2
     *                      'hmax' => <value>  max car height, def 2m
     *                      )
     * @return null
     */
    
    
    public function __construct($cars = array(), $allowDim = array())
    {

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
    /**
     * @throws Exception
     */
    public function setTotalSurface($totalSurface)
    {
        if (!is_int($totalSurface)) {
            throw new Exception('Parameter $surface must be type string');
        }

    }
    public function setAllowDim($allowDim = array()) {
        
    }
    public function getAvailableSurface() {
        
    }
}

class car implements Parkplace
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
