<?php 

function autoload($className)
{
    /*
    echo "class name " . $className;
    echo "<br>";*/
    
    $className = str_replace("/", "\\", $className);
    $filePath = __DIR__ . "\\" . $className . ".php";
    
 

    require_once $filePath;
}


 spl_autoload_register("autoload");