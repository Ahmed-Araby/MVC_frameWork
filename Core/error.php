<?php

/**
 * this file handle un catched errors
 * 
 */

namespace Core;
require_once __DIR__ . "//..//vendor//autoload.php";

class error
{
    public static function exceptionHanlder($exception)
    {
        // print to the screen 
        echo "inside exception handler";
        echo "\n";
        
        if(\config\config::showException)
        {
            var_dump($exception);
        }

        else
        {
            ini_set('error_log', \config\config::logFile);
            error_log($exception);
        }
    }   
}