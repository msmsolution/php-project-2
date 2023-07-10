<?php
//Database credentials
$dbHost = "localhost";
$dbUser = "root";
$dbPass = "";
$dbName = "crud-project";

//Database connection
$conn = mysqli_connect("$dbHost","$dbUser","$dbPass","$dbName");

//Check mysql connection
if(!$conn){
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}
