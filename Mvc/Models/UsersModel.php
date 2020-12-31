<?php 
namespace Mvc\Models;

use Core\Model;

require_once __DIR__ . "\\..\\..\\vendor\\autoload.php";


class UsersModel extends Model
{
    function __construct()
    {
    }

    function getUsers()
    {
        $pdo = self::getPdoInstance();
        $query = "select * from users";
        $resSet = $pdo->query($query);

        return $resSet;
    }
}