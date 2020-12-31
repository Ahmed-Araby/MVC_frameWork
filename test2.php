<?php 


echo "test2 file " . $x . " end of test2 file";
echo "\n";
$arr =  ["id"=>122 , 
            "name" => "ahmed"];

extract($arr);

echo $id;