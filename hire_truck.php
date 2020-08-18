<?php
include 'auth.php';
include 'config.php';

	if(isset($_POST['owner']) and isset($_POST['truck_id']) and isset($_POST['driver_id']) )
	{
		$owner = $_POST['owner'];
		// echo $roll;

		$truck_id  = $_POST['truck_id'];
		// echo $first_name;
		
		$driver_id  = $_POST['driver_id'];
		// echo $last_name;

		$id = $_SESSION['id'];
		$query1 = "SELECT * FROM users WHERE id = $id";
		$result1 = mysqli_query($con,$query1);		

		$row = mysqli_fetch_assoc($result1);
		$ecode = $row['ecode'];


		$status =1;

		$query = "INSERT INTO truck (ecode,truck_id,driver_id,status,owner) VALUES ('$ecode','$truck_id','$driver_id','$status','$owner')";

		$result=mysqli_query($con,$query);
	
		
		header('Location: view_truck_man.php');

	}	

?>