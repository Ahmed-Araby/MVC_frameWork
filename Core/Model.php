<?php 
namespace Core;
require_once __DIR__ . "\\..\\vendor\\autoload.php";

require_once "..\\config.php";

use PDO;
/**
 * this class is responsible for providing 
 * only 1 instance of the pdo throw the entire application
 * using singlton pattern
 * 
 */
 class Model
 {
     
    private static $pdo     = null;

    private static $host    = \config::dbHost;
    private static $dbEngine = \config::dbEngine;
    private static $dbName  = \config::dbName;
    
    private static $user    = \config::user;
    private static $pass    = \config::pass;

    public function __construct()
    {   
        echo "\n pdoFactory Class has been instinated \n";
    }

    public static function connect()
    {
        
        if(self::$pdo == null){
            $pdoUrl = self::$dbEngine . ":" . "host=" .
                             self::$host . ";dbname=" . self::$dbName;

            self::$pdo = new PDO($pdoUrl, self::$user, self::$pass,
            // to support arabic language, and other complicated languages.
             array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));  
            self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return ;
    }


    public static function getPdoInstance()
    {
        self::connect();
        return self::$pdo;
    }
     
 }