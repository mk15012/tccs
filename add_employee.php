<?php
include 'auth.php';
include 'config.php';

	if(isset($_POST['user_id']) and isset($_POST['first_name']) and isset($_POST['last_name']) and isset($_POST['password']) and isset($_POST['dob']) and isset($_POST['gender']) and isset($_POST['mobile']) and isset($_POST['address']) and isset($_POST['pincode']) and isset($_POST['city']) and isset($_POST['state']) and isset($_POST['country']) )
	{
		$user_id = $_POST['user_id'];

		$first_name = $_POST['first_name'];

		$last_name = $_POST['last_name'];

		$password = $_POST['password'];

		$dob = $_POST['dob'];

		$gender = $_POST['gender'];		

		$mobile = $_POST['mobile'];

		$address = $_POST['address'];

		$pincode = $_POST['pincode'];

		$city = $_POST['city'];

		$state = $_POST['state'];

		$country = $_POST['country'];

		$id = $_SESSION['id'];
		$query1 = "SELECT * from users WHERE id = $id";
		$result1 = mysqli_query($con,$query1);
		$row = mysqli_fetch_assoc($result1);
		
		$ecode = $row['ecode'];

		$identity = '1';

		$query = "INSERT INTO users (user_id,ecode,first_name,last_name,password,dob,gender,mobile,address,pincode,city,state,country,identity) VALUES ('$user_id','$ecode','$first_name','$last_name','$password','$dob','$gender','$mobile','$address','$pincode','$city','$state','$country','$identity')";

		$result=mysqli_query($con,$query);
	
		if($result)
		{
			header('Location: view_employee_man.php');
		}
		

	}	

?>