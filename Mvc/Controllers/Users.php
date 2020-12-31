<?php 


namespace Mvc\Controllers;
use Core\View;

require_once __DIR__ . "\\..\\..\\autoload.php";

class Users extends \Core\Controller
{
    /**
     * define crud methods
     */

    function __call($method, $args){
        $allowed = $this->before();
        if(is_callable([$this, $method]) && $allowed){
            
            call_user_func_array([$this, $method], $args);
        }
        $this->after();
    }

    private function before()
    {
        echo "before";
        echo "<br>";
        return true;
    } 
    private function after()
    {
        echo "after";
        echo "<br>";
        return true;
    }
    
    private function getUsers()
    {
        /**
         * will probably need to use pagination
         */
        echo "getUSers inside users class <br> <br>";
        
        
        $viewObj = new View();
        
        /*
        $viewObj->render("UsersViews\\UsersHomePage.php", $this->parms);
        */

        // using twig template engine.
        $viewObj->twigRender("home.html", $this->parms);


    }

    private function getUser()
    {
        echo "getUser inside users class <br> <br>";
        $viewObj = new View();
        $viewObj->render("UsersViews\\UsersHomePage.php", $this->parms);
    }

    private function postUser()
    {
        /**
         * there is 2 ways to get the data 
         * 1 - throw post super global 
         * 2- pass them as paramters into this method from the 
         *      router class --- which would be like dependency injection.
        */
        echo "postUser inside users class <br> <br>";
        $viewObj = new View();
        $viewObj->render("UsersViews\\UsersHomePage.php", $this->parms);
    }

    private function deleteUser()
    {
        echo "deleteUser inside users class <br> <br>";
        $viewObj = new View();
        $viewObj->render("UsersViews\\UsersHomePage.php", $this->parms);
    }

    private function updateUser()
    {
        echo "updateUser inside users class <br> <br>";
        $viewObj = new View();
        $viewObj->render("UsersViews\\UsersHomePage.php", $this->parms);
    }


}