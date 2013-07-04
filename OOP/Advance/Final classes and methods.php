<?php
/**
 * final puts a stop to inheritance. A final class cannot be subclassed.
 * Less drastically, a final method cannot be overridden
 */
final class Master
{
    public foo()
    {
        //here be code
    }
}

class Illegal extends Master {
    //here be code
}

/**
 * PHP Fatal error: Class Illegal may not inherit from
 * final class (Master) in ...
 */
