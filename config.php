<?php
$hostname="localhost";
$username="root";
$password="";
$dbname="tccs";

$con=mysqli_connect($hostname,$username,$password,$dbname);

if(!$con)
	echo "Error connecting to the database";
?>