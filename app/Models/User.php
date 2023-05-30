<?php

namespace App\Models;

class User
{
    public $first_name;
    public $last_name;
    public $email;
    
    public function setFirstName(string $FirstName = NULL)
    {
        $this->first_name = trim($FirstName);
    }

    public function getFirstName()
    {
        return $this->first_name;
    }

    public function setLastName(string $LastName = NULL)
    {
        $this->last_name = trim($LastName);
    }

    public function getLastName()
    {
        return $this->last_name;
    }

    public function getFullName()
    {
        return "$this->first_name $this->last_name";
    }

    public function setEmail(string $Email = NULL)
    {
        $this->email = $Email;
    }

    public function getEmail()
    {
        return $this->email;
    }
    
    public function getEmailVariables()
    {
        return array('full_name' => $this->getFullName(), 'email' => $this->getEmail());
    }
}

