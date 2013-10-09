<?php
interface IMeasurable
{
    public function setHeight($height);
    public function getHeight();

    public function setWidth($width);
    public function getWidth();

    public function setLength($length);
    public function getLength();
}

interface IParkplace extends IMeasurable
{
    public function addParkable(IParkable $parkable);
    public function leaveParkplace(IParkable $parkable);
}

interface IParkable extends IMeasurable
{
    public function parkIn(IParkplace $parkPlace);
    public function parkOut();
    public function isParked();
}

abstract class ParkableBase implements IParkable
{
    protected $height = 0;
    protected $length = 0;
    protected $width  = 0;
    protected $parkPlace = NULL;

    public function setHeight($height)
    {
        if($this->height) {
            throw new Exception('Height already set', 1);
        }
        $this->height = $height;
        return $this;
    }

    public function getHeight()
    {
        return $this->height;
    }

    public function setLength($length)
    {
        if($this->length) {
            throw new Exception('Length already set', 2);
        }
        $this->length = $length;
        return $this;
    }

    public function getLength()
    {
        return $this->length;
    }

    public function setWidth($width)
    {
        if($this->width) {
            throw new Exception('Width already set', 3);
        }
        $this->width = $width;
        return $this;
    }

    public function getWidth()
    {
        return $this->width;
    }

    public function parkIn(IParkplace $parkPlace)
    {
        if($this->isParked()) {
            throw new Exception('Parkable already parked', 4);
        }
        $parkPlace->addParkable($this);
        $this->parkPlace = $parkPlace;
        return $this;
    }

    public function parkOut()
    {
        if(!$this->isParked()) {
            throw new Exception('Parkable is not parked', 5);    
        }
        $this->parkPlace->leaveParkplace($this);
        $this->parkPlace = NULL;
        return $this;
    }

    public function isParked()
    {
        return NULL != $this->parkPlace;
    }
}

abstract class ParkplaceBase implements IParkplace
{
    protected $height = 0;
    protected $length = 0;
    protected $width  = 0;
    protected $parkedParkables = array();

    public function setHeight($height)
    {
        if($this->height) {
            throw new Exception('Height already set', 6);
        }
        $this->height = $height;
        return $this;
    }

    public function getHeight()
    {
        return $this->height;
    }

    public function setLength($length)
    {
        if($this->length) {
            throw new Exception('Length already set', 7);
        }
        $this->length = $length;
        return $this;
    }

    public function getLength()
    {
        return $this->length;
    }

    public function setWidth($width)
    {
        if($this->width) {
            throw new Exception('Width already set', 8);
        }
        $this->width = $width;
        return $this;
    }

    public function getWidth()
    {
        return $this->width;
    }

    public function addParkable(IParkable $parkable)
    {
        if($parkable->getHeight() >= $this->height) {
            throw new LengthException("Height is to big", 9);
        }
        if($parkable->getWidth() >= $this->width){
            throw new LengthException("Width is to big", 10); 
        }
        if($parkable->getLength() >= $this->length){
            throw new LengthException("Length is to big", 11); 
        }
        if($parkable->isParked()){
            throw new Exception("Parkable already parked", 12); 
        }
        // add the parkable to the garage
        $this->parkedParkables[] = $parkable;
        
        return TRUE;
    }

    public function leaveParkplace(IParkable $parkable)
    {
        // get the parkable out from the garage
        if(($key = array_search($parkable, $this->parkedParkables)) !== FALSE) {
            unset($this->parkedParkables[$key]);
        }
        // set the parkable parking state
        $parkable->parkState = FALSE; 
    }
}

class car extends ParkableBase {
}

class garage extends ParkplaceBase {
}

// ----- usage ----------------------

try {
    $carA = new car();
    $carA->setHeight(95)->setWidth(150)->setLength(190);

    $carB = new car();
    $carB->setHeight(95)->setWidth(150)->setLength(190);

    $garageA = new garage();
    $garageA->setHeight(120)->setWidth(200)->setLength(230);

    $garageB = new garage();
    $garageB->setHeight(120)->setWidth(200)->setLength(230);

    // $carA->parkOut(); // a car that is not parked can't be parked out

    // the car asks for parking place
    $carA->parkIn($garageA);

    //  $carA->parkIn($garageA); // a car can't be parked twice in the same garage

    // $carA->setWidth(1000); // car already initialized
    
    // $carA->parkin($garageB); // car can't change park place if it's parked
    
    // $garageA->setHeight(9999); // garage already initialized

    $carB->parkIn($garageA);
    // the car leaves the parkplace
    $carB->parkOut();
    
    // $carB->parkOut(); // a car can't be unparked more then once

    var_dump($carA, $garageA);

    // the garageA sends the car out from the parking place
    $garageA->leaveParkplace($carA);
    var_dump($carA,$carB, $garageA);
    $carB->parkIn($garageA);
} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), ' error code: #', $e->getCode(), "\n";
}
