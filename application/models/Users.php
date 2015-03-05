<?php

class Users extends CI_Model
{
    var $username;
    var $hashedPassword;
    var $id;

    function __construct()
    {
        parent::__construct();
    }


    /**
     * This will authentiacte a user and check if there password is valid with their username
     * This is an expensive process beucase it contains 3 hashing methods with salting. Making
     * the password very secure.
     *
     * @param $username
     * @param $password
     *
     * @return bool
     */
    function authenticate($username, $password)
    {
        $halfHash = crypt($password, md5($password."xio"));
        $fullHashed = md5($halfHash."$halfHash;'/1rnr$password");

        if($fullHashed === $password)
        {
            //Password is valid
            return true;
        }
        else
        {
            //Password is invalid
            return false;
        }
    }


}