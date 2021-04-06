<?php

class User {
    public $userId;
    public $firstName;
    public $lastName;
    public $birthday;
    public $email;

    public function getFirstName(){
        return $firstName;
    }

    public function setFirstName($FirstName){
        $firstName = $FirstName;
    }

    /*function __construct($_userId, $_firstName, $_lastName, $_birthday, $_email){
        $userId = $_userId;
        $firstName = $_firstName;
        $lastName = $_lastName;
        $birthday = $_birthday;
        $email = $_email;
    }*/

    function getAge(){
        $unixBirthday = strtotime($birthday);
        $today = new DateTime();
        $unixAge = $unixBirthday-($today->getTimestamp);
        $age = intval($unixAge/3600/24/365);
        return $age;
    }

    function isAdult(){
        if(getAge()>=18){
            return TRUE;
        } else {
            return FALSE;
        }
    }
}