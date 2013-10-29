<?php
class foo
{
    public function baz($param = null)
    {
        if($param == null){
            throw new Exception("Parameter is null!");
        }
        return ($param) ? true : false;
    }
}
