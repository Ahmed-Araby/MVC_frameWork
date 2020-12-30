<?php 
    /*
    take the route registred by the dev and convert it into regular expression.
    then this regular expression will then be used to extract the needed information 
    from the request url.
    
    {controller}/{action}
    {controller}\/{action} -- step1 
    '(?P<controller>[a-z-]+)\/'(?P<action>[a-z-]+)' -- second step 
    '/^(?P<controller>[a-z-]+)\/'(?P<action>[a-z-]+)&/i' -- third step
    
    the last regex will be used to extract controller and action from the request url
    this could allow for text before the {}/{} or after
    this also can extract url variables.
    but this will couple the controller and action of the dev code to the url 
    also this will time us to a specific naming convention.  

    */

$routes = ["ako/{co}/{me}/{id:\d+}/oka",
            "users/{controller}/get/{show}", 
            "users/{controller}/delete/{delete}", 
            "groups/{gid}/users/{uid}"
];

// convert all theses routes into regex that will be used to extract 
// the route variables.

// it's not about matching but extracting.

// skip forward slashes 
$res = preg_replace('/\//' , '\\/', $routes[0]);

// convert into regex with named groups, we need to use single quotes.
$res = preg_replace('/\{([a-z]+)\}/', '(?P<\1>[a-z-]+)', $res);

// detect variables 
$res = preg_replace('/\{([a-z]+):(.+)\}/', '(?<\1>\2)', $res);


$res = '/^' . $res . '$/';
echo $res;
echo "\n";
echo "\n";

$find = preg_match($res, "ako/co/me/222/oka", $matches);
print_r($matches);