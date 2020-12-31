<?php 

function autoload($className)
{
    
    echo "class name " . $className;
    echo "\n";

    $className = str_replace("/", "\\", $className);
    $filePath = __DIR__ . "\\" . $className . ".php";
    
    echo $filePath;

    require_once $filePath;
}


 spl_autoload_register("autoload");