<?php 
/**
 * we could use {} to enclose url variables
 * I did it with dataType:VarName
 */

namespace Core;
require_once __DIR__ . "\\..\\autoload.php";

class Router
{
    // router tables / associative arrays 
    private $getTable       = [];
    private $postTable      = [];
    private $putTable       = [];
    private $deleteTable    = [];
    private $patchTable     = [];

    public function __construct()
    {
    }

    function getUrlParm($part)
    {
        /**
         * check if this part of the registred url 
         * is url parameter then get the type and the variable name
         * 
         * this is under the assumption that 
         * ":" is not allowed to be used inside url
         */

        $response = ["isUrlParm" => false];
        
        $partL = explode(":", $part);
        if(count($partL) != 2) 
            return $response;

        $response['isUrlParm'] = true;
        $response['type'] = $partL[0];
        $response['varName'] = $partL[1];
        return $response;
    }

    function checkType($type, $value)
    {
        /**
         * this is supposed to check that value of 
         * type $type, other wise abort
         */
        return true;
    }

    // resolve route
    function match($regRoute, $reqRoute)
    {
        /**
         * match individual routes
         * just do sophistated match 
         * and get the url parameters if exist
         */

        $response = [
            "success" => false, 
            "urlParms" => []  // will be a key value pair
        ];

        $regRouteL = explode('/', $regRoute);
        $reqRouteL = explode('/', $reqRoute);
        if(count($regRouteL) != count($reqRouteL))
            return $response;
        

        $urlParms = [];
        for($index = 0; $index < count($regRouteL); $index++)
        {
            if($regRouteL[$index] != $reqRouteL[$index]){
                // check for being url parameter
                $urlParmResponse = $this->getUrlParm($regRouteL[$index]);
                if($urlParmResponse['isUrlParm'] == false)
                    return $response;
                
                // assign parameter
                 if($this->checkType($urlParmResponse['type'], $reqRouteL[$index])){
                     $urlParms[$urlParmResponse['varName']] = $reqRouteL[$index];
                 }

                 // else U should abort.

            } 
        }

        $response['success'] = True;
        $response['urlParms'] = $urlParms;

        return $response;
    }

    function matchRoutes($table, $reqRoute)
    {
        /**
         * loop over all routes of table and 
         * match the registreed routes with the request route
         */
        $parms = null;
        foreach($table as $regRoute => $regParms){
            // match individual routes
            $response = $this->match($regRoute, $reqRoute);

            if($response['success']){
                $parms = $regParms;
                if(isset($parms['actionParms']))
                    // add to it, will never be set right now.
                    $xx = 11;
                else 
                    $parms['actionParms'] = $response['urlParms'];

                break;
            } 
        }

        return $parms;
    }
    
    function getParms($route, $method)
    {
        /**
         * identify the right route table 
         * then match 
         */

        $parms = null;

        if(strtolower($method) == "get")
            $parms = $this->matchRoutes($this->getTable, $route);

        if(strtolower($method) == "post")
            $parms = $this->matchRoutes($this->postTable, $route);
        
        return $parms;
    }

    function resolveRoute()
    {
        /**
         * call the right action of the right controller 
         * with the right arguments
         */

        $route = $_SERVER['QUERY_STRING'];
        $method = $_SERVER['REQUEST_METHOD'];

        $parms = $this->getParms($route, $method);
        if($parms == null){
            return $this->notFound($route);
        }

        $class = $parms['controller'];
        $action = $parms['action'];
        $actionParms = $parms['actionParms'];
        

        /**
         * we need to inject data into the called controller !!!
         * we can do this using call_user_func_array method
         */
        //print_r($parms);
        // call the controller in the charge
        $controllerObj = new $class($actionParms); //new \Mvc\Controllers\Users();
        $controllerObj->$action();
    }

    // register routes
    function get($route, $parms)
    {
        if(!isset($parms['controller']) || 
        !isset($parms['action']) ){
            throw new \Exception("parms for route " . $route ." is not formated probably");
        }

        $this->getTable[$route] = $parms;
    }

    function post($route, $parms)
    {
        if(!isset($parms['controller']) || 
        !isset($parms['action']) ){
            throw new \Exception("parms for route " . $route ." is not formated probably");
        }

        $this->postTable[$route] = $parms;
    }

    // same for other http methods to support REST architecture design.

    function notFound($route)
    {
        echo "404 there is no such resource ... " . $route . "<br>";
    }


    // for testing 
    function disp(){
        var_dump($this->getTable);
    }

}