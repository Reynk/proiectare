<?php

class Admin
{
    private $username;
    private $password;

    public function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
    }

    public function login()
    {
        // check if the username and password are valid
        // return true if the login is successful and redirect to admin page, otherwise return false
    }

    public function logout()
    {
        // return to main page
    }

    public function addEvent($eventName)
    {
        // add a new event to the database
    }

    public function updateEvent($eventName)
    {
        // update an existing event in the database
    }

    public function deleteEvent($eventId)
    {
        // delete a event from the database
    }

    public function sendInvite($eventId)
    {
        // send an email to all users for an event
    }
}