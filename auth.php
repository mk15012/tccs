<?php
session_start();
if(!isset($_SESSION['id']) and !isset($_SESSION['username'])) {
	header('Location: index.html');
}

?>