<?php 
/**
 * files accessible for the public
 * 
 * REQUEST_URI 
 * QUERY_STRING 
 * stick with the querey string write know untill U know how to reconfigure this 
 * root address.
 * 
 * this file is our app entry point
 * echo "this is the public folder of my website <br>";
*/
/*
foreach($_SERVER as $key => $value)
{
    echo $key . "  : "  . $value;
    echo "<br> <br>";
}
*/

require_once "../Core/Router.php";
$router = new Router();

// register get routes 
$router->get('/users/int:id/color/int:age', ["controller" => "Users",
                                "action" =>"getUser"]);

$router->post('/users', ["controller" => "Users",
                                "action" =>"postUser"]);

/*
// how to escape < 
$router->get('/users/int:id', ["controller" => "Users",
                                    "action" =>"getUser"]);
*/



// resolve 
$router->resolveRoute();

