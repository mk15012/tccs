<?php
include 'auth.php';
include 'config.php';

	if(isset($_POST['revenue_rate']))
	{
		$revenue = $_POST['revenue_rate'];
		$id = $_SESSION['id'];

		
			$query = "UPDATE users SET rate ='$revenue' WHERE id=$id ";
			$result = mysqli_query($con,$query);			

			if($result)
				echo $id;

			else
				echo 0;
	}


?>