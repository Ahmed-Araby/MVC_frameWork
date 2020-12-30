<?php 

class Users
{

    function __construct()
    {
        echo "users class is instinated <br>";
        return ;
    }

    /**
     * define crud methods
     */
    function getUsers()
    {
        /**
         * will probably need to use pagination
         */
        echo "getUSers inside users class <br> <br>";
    }

    function getUser()
    {
        echo "getUser inside users class <br> <br>";
    }

    function postUser()
    {
        /**
         * there is 2 ways to get the data 
         * 1 - throw post super global 
         * 2- pass them as paramters into this method from the 
         *      router class --- which would be like dependency injection.
        */
        echo "postUser inside users class <br> <br>";
    }

    function deleteUser()
    {
        echo "deleteUser inside users class <br> <br>";
    }

    function updateUser()
    {
        echo "updateUser inside users class <br> <br>";
    }


}