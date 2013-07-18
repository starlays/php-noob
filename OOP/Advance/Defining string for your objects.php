<?php
/**
 * The __toString() method allows a class to decide how it will react when it is
 * treated like a string. For example, what echo $obj; will print. This method
 * must return a string, as otherwise a fatal E_RECOVERABLE_ERROR level error is
 * emitted.
 *
 * It is worth noting that before PHP 5.2.0 the __toString() method was only
 * called when it was directly combined with echo or print. Since PHP 5.2.0, it
 * is called in any string context (e.g. in printf() with %s modifier) but not
 * in other types contexts (e.g. with %d modifier). Since PHP 5.2.0, converting
 * objects without __toString() method to string would cause
 * E_RECOVERABLE_ERROR.
 */
class foo
{
    public $bar;

    public function __construct($bar)
    {
        $this->bar = $bar;
    }

    public function __toString()
    {
        return $this->bar;
    }
}

$object = new foo('Hello');
// This will invoke the magic method __toString()
echo $object;
