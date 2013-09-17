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
     *
     * @return null
     */
    public function setWidth($width);
    /**
     * setHeight (str $height) method used to set parkable height
     *
     * @param int $height the height of parkable object
     *
     * @return null
     */
    public function setHeight($height);
    /**
     * setLenght (str $length) method used to set parkable length
     *
     * @param int $length the length of parkable object
     *
     * @return null
     */
    public function setLenght($length);
    /**
     * setIsParked (str $isParked) method used to set parkable parked state
     *
     * @param bool $isParked the parked state of the parkable object
     *
     * @return null
     */
    public function setIsParked($isParked);
    /**
     * getWidth() method used to get the width
     *
     * @return null
     */
    public function getWidth();
    /**
     * getHeight() method used to get the height
     *
     * @return null
     */
    public function getHeight();
    /**
     * getLength() method used to get the length
     *
     * @return null
     */
    public function getLength();
    /**
     * getSurface() method used to get the area of the parkable object
     *
     * @return null
     */
    public function getSurface();
    /**
     * getParkState() method used to get parkable state (parked or nod)
     *
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
     *
     * @throws Exception
     * @return null
     */
    public function setTotalSurface($totalSurface);
     /**
     * setAllowDim(array $allowDim) method used to set the maxium dimensions
     * allowd in to the parkplace
     *
     * @param array $allowDim
      *
     * @throws Exception
     * @return null
     */
    public function setAllowDim($allowDim = array());
    /**
     * setTotalParkble(int $totalParkble) method use to set the total pakble
     *
     * @param int $totalParkble
     *
     * @throws Exception
     * @return null
     */
     public function setTotalParkble($totalParkble);
     /**
      * setParkable(Parkable $parkable) set Parkable parking state
      *
      * @param Parkable $parkable
      *
      * @throws Exception
      * @return bool
      */
     public function setParkable(Parkable $parkable);
    /**
     * getAvailableSurface() method used to get the availale surface left in
     * the parkplace
     *
     * @return availableSurface
     */
    public function getAvailableSurface();
    /**
     * getTotalParkble() used to get the total parkable
     *
     * @return totalParkble
     */
    public function getTotalParkble();

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
    protected $totalParkble    = 0;
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
                                'smax' =>5,
                                'hmax' =>2
                             );
    /**
     * Error messages
     */
    const ERR_SURFACE  = 'Parameter $surface must be type string';
    const ERR_ALLOWDIM = 'Parameter $allowDim array geometry is not according to signature';
    const ERR_FORMAT   = 'Parameter $allowDim is not array or empty';
    const ERR_SMAX     = 'Maximum area exceeded';
    const ERR_HMAX     = 'Maximum height exceeded';
    const ERR_PARKBLE  = 'Parameter $totalParkble must be int and not 0';

    public function setParkable(Parkable $parkable)
    {
        if($parkable->surface >= $this->allowDim['smax']) {
            throw new Exception(ERR_SMAX, 4);
        }
        if($parkable->height >= $this->allowDim['hmax'])
        {
            throw new Exception(ERR_HMAX, 5);
        }

        $this->totalSurface = $this->totalSurface - $parkable->surface;
        $parkable->setIsParked(TRUE);

        return TRUE;
    }

    public function setTotalSurface($totalSurface)
    {
        if (!is_int($totalSurface)) {
            throw new Exception(ERR_SURFACE, 1);
        }
        $this->totalSurface = $totalSurface;
    }

    public function setAllowDim($allowDim = array())
    {
        if(!is_array($allowDim) || empty($allowDim)) {
            throw new Exception(ERR_FORMAT, 2);
        }
        if(!isset($allowDim['smin']) && !isset($allowDim['smax']) &&
                                                !isset($allowDim['hmax'])) {
            throw new Exception(ERR_ALLOWDIM, 3);
        }
        $this->allowDim = $allowDim;
    }

    public function setTotalParkble($totalParkble)
    {
        if(!is_int($totalParkble) || 0 == $totalParkble) {
            throw new Exception(ERR_PARKBLE, 4);
        }
    }

    public function getAvailableSurface()
    {
        return $this->totalSurface;
    }

    public function getTotalParkble()
    {
        return $this->totalParkble;
    }
}

class car implements Parkable
{
     /**
     * @var int $width the width of the car
     */
    protected $width  = 0;
     /**
     * @var int $lenght the height of the car
     */
    protected $lenght  = 0;
    /**
     * @var int $height the height of the car
     */
    protected $height  = 0;
    /**
     * @var string $color the color of the car
     */
    protected $color   = NULL;
    /**
     * @var bool $isParked car status holder, is parked or not
     */
    protected $isParked = FALSE;
    /**
     * Error constants
     */
    const ERR_WIDTH  = 'Parameter $width must be int possitiv different from 0';
    const ERR_LENGHT = 'Parameter $lenght must be int possitiv diferent from 0';
    const ERR_HEIGHT = 'Parameter $height must be int possitiv diferent from 0';
    const ERR_PARKED = 'Parameter $isParked must be boolean';
    
    public function setWidth($width) {
        if(!is_int($width) || 0 == $width) {
            throw new Exception(ERR_WIDTH, 6);
        }
        
        $this->width = $width;
    }

    public function setLenght($length) {
       if(!is_int($length) || 0 == $length) {
            throw new Exception(ERR_LENGHT, 7);
        }
        
        $this->length = $length;
    }
    
    public function setHeight($height) {
       if(!is_int($height) || 0 == $height) {
            throw new Exception(ERR_HEIGHT, 8);
        }
        
        $this->height = $height;
    }
    
    public function setIsParked($isParked) {
       if(!is_bool($isParked) || empty($isParked)) {
            throw new Exception(ERR_PARKED, 9);
        }
        
        $this->isParked = $isParked;
    }

    
    public function getWidth() {
        return $this->width;
    }
    
    public function getSurface() {
        return $this->width * $this->length;
    }
    
    public function getParkState() {
        return $this->isParked;
    }
    
    public function getLength() {
        return $this->length;

    }
    
    public function getHeight() {
        return $this->height;
    }
    
    public function getColor()
    {
        return $this->color;
    }
}
