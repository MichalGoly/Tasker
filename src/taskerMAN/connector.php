<?php

$servername = "db.dcs.aber.ac.uk:3306";
$username = "csgpadm_12";
$password = "RCORoND6";
$database = "csgp_12_15_16";
//Create connection

$connection =  new mysqli($servername, $username, $password,$database );

//check connection

if($connection->connect_error){
	die("connection failed: " . $connection->connect_error);
}




?>