<?php 

namespace Core;
abstract class Controller 
{
    protected $parms = [];
    function __construct($parms)
    {
        /**this constructor
         * will be called on instinating any 
         * type of controller obejct that will extend [this] class.
         */
        $this->parms = $parms;
    }
}
