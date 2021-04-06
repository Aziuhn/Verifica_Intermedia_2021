<?php

class User {
    public $userId;
    public $firstName;
    public $lastName;
    public $birthday;
    public $email;

    /*public function getFirstName(){
        return $firstName;
    }

    public function setFirstName($FirstName){
        $firstName = $FirstName;
    }*/

    /*function __construct($_userId, $_firstName, $_lastName, $_birthday, $_email){
        $this->userId = $_userId;
        $this->firstName = $_firstName;
        $this->lastName = $_lastName;
        $this->birthday = $_birthday;
        $this->email = $_email;
    }*/

    function getAge(){
        $unixBirthday = strtotime($this->birthday);
        $today = new DateTime();
        $unixAge = ($today->getTimestamp())-$unixBirthday;
        $age = intval($unixAge/3600/24/365);
        return $age;
    }

    function isAdult(){
        if($this->getAge()>=18){
            return TRUE;
        } else {
            return FALSE;
        }
    }
}