<?php
/**
 * class_exists
 * is_callable
 */

function fun($x, $y)
{
    echo $x . " "  . $y;
}


call_user_func_array('fun', ["y"=>1, 
                                "x"=>2]);

require_once "Mvc/Controllers/Users.php"; // \ or // could be used as path seprator.
$obj = new Mvc\Controllers\Users();
var_dump($obj);