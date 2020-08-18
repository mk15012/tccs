<?php
include'config.php';
include 'auth.php';

if(isset($_SESSION['id']) and isset($_SESSION['username'])) 
{
	unset($_SESSION['id']);
	unset($_SESSION['username']);
	header('Location: index.html');
}

?>