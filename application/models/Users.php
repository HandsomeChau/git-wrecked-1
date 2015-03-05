<?php

class Users extends CI_Model
{
    var $username = "";
    var $hashedPassword = "";
    var $id = "";

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

        $actualPassword = $this->getPassword($username);

        if($fullHashed === $actualPassword)
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

    /**
     * This is public for testing purposes only and should be private in the future and only used inside the Users model
     *
     * @param $username
     *
     * @return string (hashed password)
     */
    public function getPassword($username)
    {
        $query = $this->db->query("SELECT hashedPassword FROM users WHERE username LIKE '$username'");
        return $query->result();
    }


}