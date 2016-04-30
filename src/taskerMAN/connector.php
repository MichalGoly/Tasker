<?php
//database log in details
$servername = "db.mysql.co.uk:3306";
$username = "username";
$password = "password";
$database = "database_name";
//Create connection

$connection =  new mysqli($servername, $username, $password,$database );

//check connection

if($connection->connect_error){
	die("connection failed: " . $connection->connect_error);
}




?>
