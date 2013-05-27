<?php

// Class declaration and implementation

class Foo {
    /**
     * Class properties and methods can be manipulated in terms of visibility
     * The visibility can be set by prefixing the declaration with one of the
     * fallowing keywords: public, protected, private

     * - public:    class members declared public can be accessed everywhere
     * - protected: class members declared protected can be accessed only
     *              within the class itself and by inherited and parent classes
     * - private:   class members declared as private may only be accessed by
     *              the class that defines the member
     */

    // set class properties
    private $bar = NULL;

    // set class methods
    // a setter method:
    function set_bar($bar)
    {
        /**
         * The pseudo-variable $this is available when a method is called from
         * within an object context. $this is a reference to the calling object
         * (usually the object to which the method belongs, but possibly another
         * object, if the method is called statically from the context of a 
         * secondary object). 
         */
        $this->bar = $bar;
    }
    // a getter method
    function get_bar() 
    {
        return $this->bar;
    }
}

// Creating an object type Foo, or we can say creating an instance of class Foo
$object = new Foo;
// Setting the value of $bar inside the object
$object->set_bar('baz');
// Getting the value of $var from object
echo $object->get_bar();
