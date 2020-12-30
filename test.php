<?php


class a 
{
    public $x = 22;
}


$obj1 = new a;
$obj2 = clone $obj1;

$obj2->x = 33;
var_dump($obj2);