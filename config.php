<?php
$host="localhost";
$user="root";
$password="root";
$dbname="sparks";
$conn = mysqli_connect($host, $user, $password, $dbname);

    if(!$conn){
        die("Could not connect to the Database".mysqli_connect_error());
    }
?>