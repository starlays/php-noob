<?php

abstract class Students {

    private $course;
    public function __construct()
    {
        $this->group = static::getCourse();
    }
    /**
     * PHP 5.3 introduced a concept called late static bindings. The most obvious
     * manifestation of this feature is a new keyword: static. static is similar
     * to self, except that it refers to the invoked rather than the containing
     * class.
     */
    public static function create()
    {
        return new static();
    }

    static function getCourse() 
    {
        return "default";
    }
}

class StudentA extends Students {
    
    public static function getCourse()
    {
        return "english";
    }
}

class StudentB extends Students {
    
    public static function getCourse()
    {
        return "math";
    }
}

var_dump(StudentA::create());
var_dump(StudentB::create());
