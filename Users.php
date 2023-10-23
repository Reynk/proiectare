<?php

class User
{
    private $username;
    private $email;
    private $password;

    public function __construct($username, $email, $password)
    {
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
    }

    public function login($username, $password)
    {
        // check if the username and password are valid
        // return true if the login is successful and show buy button for events, otherwise return false
    }
}