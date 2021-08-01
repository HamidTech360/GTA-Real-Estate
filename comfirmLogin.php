<?php
require "connection.php";

$email = $_POST['email'];
$password = $_POST['password'];


$select = "SELECT * FROM members WHERE email = '$email' AND password= '$password'";
$query = mysqli_query($connect, $select);

if(mysqli_num_rows($query) > 0){
    echo "1";
    $_SESSION['email'] = $email;
}else{
    echo "0";
}