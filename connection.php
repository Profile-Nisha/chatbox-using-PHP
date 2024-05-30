<?php

$server = "localhost";
$usernme = "root";
$password = "";
$db_name = "dashboard";
$conn = mysqli_connect($server, $usernme, $password, $db_name);

if(!$conn){
    echo "Connection Failed!";
}else{
    // echo "connection successful";
}



?>