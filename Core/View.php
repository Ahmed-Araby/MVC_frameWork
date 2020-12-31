<?php 

namespace Core;
class View
{
    function render($view, $args)
    {
        $filePath = __DIR__ . "\\..\\Mvc\Views\\" . $view;
        
        if(is_readable($filePath))
        {
            /**
             * nwo the file that we required will be be able to access 
             * the values inside the associative array args 
             * using it's keys.
             */

            extract($args);
            require_once $filePath;    
        }
        else {
            echo "file at " . $filePath . " don't exist";
        }
    }

    function twigRender($view, $args)
    {
        
    }

}