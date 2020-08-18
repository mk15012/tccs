<?php
session_start();
include 'config.php';

if(isset($_POST['username']) and isset($_POST['password'])) 
{
	$userid = $_POST['username'];
	$password = $_POST['password'];
	// echo $username;
	// echo $password;

	$userid_query = "SELECT * FROM users WHERE user_id = '$userid' ";
	$temp=0;
	
	$result = mysqli_query($con, $userid_query);
	if ($result) 
	{
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		$pass = $row['password'];
		// echo $pass;
		if($pass == $password)
		{
			$_SESSION['id'] = $row['id'];
			$_SESSION['username'] = $row['user_id'];
			
			$status = $row['identity'];
			// if($status == 3)
			// {
			// 	header('Location: admin_panel.php');
			// }

			// else if($status == 2)
			// {
			// 	header('Location: manager_panel.php');
			// }

			// else if($status == 1)
			// {
			// 	header('Location: employee_panel.php');
			// }
			echo $status;
			
		}
		else
		{
			// header( "refresh:1.10;url=index.html" );
			// echo 'Invalid Username/Password';
			echo $temp;
		}
	}

	else
	{
		// header( "refresh:1.10;url=index.html" );
		// echo 'Username does not exist';
		echo $temp;
	}
}

?>