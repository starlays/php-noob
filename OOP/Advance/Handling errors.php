<?php

class shop
{
    private static $total = NULL;

    //the method accepts an object type product
    public function seTotal(Product $product)
    {
        $this->total = $this->total + $product->price;
    }

}

class Product
{
    private $price = NULL;
    private $name  = NULL;

    public function __construct($name, $price)
    {   
        if(!is_string($name)) {
            throw new Exception('$name is not type string');
        }
        if(!is_int($price)) {
            throw new Exception('$price is not int');
        }
        $this->name  = $name;
        $this->price = $price; 
    }
}

try {
    $product = new Product('foo', 20);
    var_dump($product);
    $product2 = new Product(1, 'a');
    var_dump($product2);
    $shop = new shop();
    /**
     * About catchble fatal error: http://bit.ly/9uBTsd
     */ 
    $shop->seTotal('15');

} catch (Exception $e) {
    die ($e->__toString() );
}
