<?php

require __DIR__."/mockdata_array.php";
require __DIR__."/../classes/User.php";

$usersList=[];

foreach($users as $user){
    extract($user);
    $utente = new User($userId, $firstName, $lastName, $birthday, $email);
    /*$utente->userId=$user['userId'];
    $utente->firstName=$user['firstName'];
    $utente->lastName=$user['lastName'];
    $utente->birthday=$user['birthday'];
    $utente->email=$user['email'];
    array_push($usersList, $utente);*/
    echo ($utente->getAge()."\n");
    echo ($utente->isAdult()."\n");
}

//print_r($usersList);