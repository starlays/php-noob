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
    public function checkMesures(IParkble $parkable);
    public function addParkable(IParkble $parkable);
    public function parkOut();
}

interface IParkable extends IMeasurable
{
    public function parkIn(IParkplace $parkPlace);
}

abstract class ParcableBase implements IParkable
{
    protected $height = 0;
    protected $length = 0;
    protected $width  = 0;

    public function setHeight($height)
    {
        $this->height = $height;
        return $this;
    }

    public function getHeight()
    {
        return $this->height;
    }

    public function setLength($length)
    {
        $this->length = $length;
        return $this;
    }

    public function getLength()
    {
        return $this->length;
    }

    public function setWidth($width)
    {
        $this->width = $width;
        return $this;
    }

    public function getWidth()
    {
        return $this->width;
    }

    public function parkIn(IParkplace $parkPlace)
    {
        $parkPlace->addParkable($this);
    }
}

abstract class ParkableBase implements IParkplace
{
    protected $height = 0;
    protected $length = 0;
    protected $width  = 0;
    
    public function setHeight($height)
    {
        $this->height = $height;
        return $this;
    }

    public function getHeight()
    {
        return $this->height;
    }

    public function setLength($length)
    {
        $this->length = $length;
        return $this;
    }

    public function getLength()
    {
        return $this->length;
    }

    public function setWidth($width)
    {
        $this->width = $width;
        return $this;
    }

    public function getWidth()
    {
        return $this->width;
    }
    
    public function checkMesures(IParkble $parkable)
    {
        if($parkable->getHeight() >= $this->height) {
            
        }
    }
    
    public function addParkable(IParkble $parkable)
    {
        
    }
    public function parkOut()
    {
        
    }    
}
