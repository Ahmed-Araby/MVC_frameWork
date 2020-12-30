<?php


$reg = "/\//";
$str = "ahmed / araby ";
echo preg_match($reg,$str, $match);

print_r($match);