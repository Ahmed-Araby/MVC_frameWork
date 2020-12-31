<?php 
namespace Mvc\Models;

require_once __DIR__ . "\\..\\..\\vendor\\autoload.php";


class UsersModel
{
    function __construct()
    {
    }

    function getUsers()
    {
        $pdo = \Core\pdoFactory::getPdoInstance();
        $query = "select * from users";
        $resSet = $pdo->query($query);

        return $resSet;
    }
}