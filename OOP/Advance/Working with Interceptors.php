<?php
/**
 * This is also known as overloading. Overloading in PHP provides means to dynamically
 * "create" properties and methods. These dynamic entities are processed via magic
 * methods one can establish in a class for various action types.
 * PHP 5 supports three built-in interceptor methods. Like __construct(),
 * these are invoked for you when the right conditions are met.
 * The overloading methods are invoked when interacting with properties
 * or methods that have not been declared or are not visible in the current scope.
 * The rest of this section will use the terms "inaccessible properties" and
 * "inaccessible methods" to refer to this combination of declaration and visibility. 
 *
 *  __set() is run when writing data to inaccessible properties.
 *  __get() is utilized for reading data from inaccessible properties.
 *  __isset() is triggered by calling isset() or empty() on inaccessible properties.
 *  __unset() is invoked when unset() is used on inaccessible properties. 
 * __call(string $name , array $arguments) Invoked when an undefined method is called
 * __callStatic(string $name , array $arguments) is triggered when invoking 
 *   inaccessible methods in a static context.
 */
class Interceptors
{
    public function __set($property)
    {
        return "{$property} undefined! Returned from __set() interceptor!";
    }

    public function __get($property)
    {
        return "{$property} undefined! Returned from __get() interceptor!";
    }

    public function __isset($property)
    {
        return "{$property} undefined! Returned from __isset() interceptor";
    }

    public function __unset($property)
    {
        return "{$property} undefined! Returned from __unset() interceptor";
    }

    public function __call($methodName, $methodArguments)
    {
        return "Undefined method: {$methodNname} called with arguments:
                {$methodArguments} in object context";
    }

    public static function _callStatic($methodName, $methodArguments)
    {
        return "Undefined method: {$methodNname} called with arguments:
                {$methodArguments} in static context";
    }
}

$object = new Interceptors();
//trigger the __set() interceptor
$object->property = 'value';
//trigger the __get() interceptor
$object->property;
//trigger the __isset() interceptor
isset($object->property);
empty($object->property);
//trigger the __unset() interceptor
unset($object->property);
//trigger the __call() interceptor
$object->dynamicMethod('values');
//trigger the __callStatic() interceptor
Interceptors::staticdynamicMethod('values');
