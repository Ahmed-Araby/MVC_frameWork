<?php 
//error_reporting(0);

function handlerExp($excp)
{
    echo "handlerExp : " . $excp . "the end ";
    echo "\n";
    return ;
}

set_exception_handler("handlerExp");
/*
echo "user Home page";
echo "<br>";
echo "<br>";

foreach($users as $user){   
    print_r($user);
    echo "<br>";
}
*/


throw new Exception("bad php");

echo "exception handled";

echo "<br>";
echo "every think is okay ";