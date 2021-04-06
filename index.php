<?php

require __DIR__."/classes/User.php";
require __DIR__."/vendor/JSONReader.php";

if(isset($_GET['locId']) && $_GET['locId']!==""){
    $locId = intval($_GET['locId']);
} else {
    $locId = "";
}

if(isset($_GET['locFirstName']) && $_GET['locFirstName']!==""){
    $locFirstName = $_GET['locFirstName'];
} else {
    $locFirstName = "";
}

if(isset($_GET['locLastName']) && $_GET['locLastName']!==""){
    $locLastName = $_GET['locLastName'];
} else {
    $locLastName = "";
}

if(isset($_GET['locEmail']) && $_GET['locEmail']!==""){
    $locEmail = $_GET['locEmail'];
} else {
    $locEmail = "";
}

if(isset($_GET['locAge']) && $_GET['locAge']!==""){
    $locAge = $_GET['locAge'];
} else {
    $locAge = "";
}

$usersList = JSONReader(__DIR__."/dataset/users-management-system.json");
$users = [];
foreach($usersList as $user){
    extract($user);
    $utente = new User($userId, $firstName, $lastName, $birthday, $email);
    array_push($users, $utente);
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <style>
        input.form-control {
            padding: 2px;
            line-height: 100%;
            font-size: 1.5rem;
        }
    </style>
</head>

<body>
    <header class="container-fluid bg-secondary text-light p-2">
        <div class="container">
            <h1 class="display-3 mb-0">
                User management system
            </h1>
            <h2 class="display-6">user list</h2>
        </div>
    </header>
    <form action="index.php">
    <div class="container">
        
            <table class="table">
                <tr>
                    <th>id</th>
                    <th>nome</th>
                    <th>cognome</th>
                    <th>email</th>
                    <th cellspan="2">età</th>
                </tr>
                <tr>
                    <th>
                        <input class="form-control" type="text" name="locId" value=<?php echo $locId?>>
                    </th>
                    <th>
                        <input class="form-control" type="text" name="locFirstName" value=<?php echo $locFirstName?>>
                    </th>
                    <th>
                        <input class="form-control" type="text" name="locLastName" value=<?php echo $locLastName?>>
                    </th>
                    <th>
                        <input class="form-control" type="text" name="locEmail" value=<?php echo $locEmail?>>
                    </th>
                    <th>
                        <input class="form-control" type="text" name="locAge" value=<?php echo $locAge?>>
                    </th>
                    <th>
                        <input type="submit" class="btn btn-primary" value="cerca">
                    </th>
                </tr>

                <?php
                foreach($users as $user){
                    if($user->id===$locId || $user->id===""){
                        if($user->firstName===$locFirstName || $user->firstName===""){
                            if($user->lastName===$locLastName || $user->lastName===""){
                                if($user->email===$locEmail || $user->email===""){
                                    if($user->getAge()===$locAge || $user->getAge()===""){
                                        echo ("
                                        <tr>
                                            <td>$user->id<td>
                                            <td>$user->firstName<td>
                                            <td>$user->lastName<td>
                                            <td>$user->email<td>
                                            <td>$user->age<td>
                                        <tr>
                                        ");
                                    }
                                }
                            }
                        }
                    }
                }
                ?>


                <tr>
                    <td>10</td>
                    <td>Mario</td>
                    <td>Rossi</td>
                    <td>mariorossi@email.com</td>
                    <td>15 </td>
                </tr>
                <tr>
                    <td>13</td>
                    <td>Mario</td>
                    <td>Mario</td>
                    <td>mariomario@email.com</td>
                    <td>20 </td>
                </tr>
            </table>
        
    </div>
    </form>
</body>

</html>