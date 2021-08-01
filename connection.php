<?php

$host = "localhost";
$username="root";
$password = "";
$db = "gta";

$connect = mysqli_connect($host, $username, $password, $db);
session_start();
// if($connect){
//     echo "connection established";
// }else{
//     echo "failed to establish connection";
// }