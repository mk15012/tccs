<?php
include 'auth.php';
include 'config.php';

	if(isset($_POST['newpsd']) and isset($_POST['rpsd']))
	{
		$password = $_POST['newpsd'];
		$cpassword = $_POST['rpsd'];
		$id = $_SESSION['id'];

		if($password==$cpassword)
		{
			$query = "UPDATE users SET password ='$password' WHERE id=$id ";
			$result = mysqli_query($con,$query);
			if($result)
			{
				$query1 = "SELECT * FROM users WHERE id=$id ";
				$result1 = mysqli_query($con,$query1);

				$row = mysqli_fetch_assoc($result1);

				$identity = $row['identity'];

				if($identity == 3)
					echo 3;
					// header('Location: profile_admin.php');
				else if($identity == 2)
					echo 2;
					// header('Location: profile_man.php');
				else if($identity == 1)
					echo 1;
					// header('Location: profile_emp.php');
				// echo "Password Updated";
				// header( "refresh:1.10;url=index.html" );
			}

		}
		
		else
		{
			echo 100;
		}
	}

	else
	{
		echo 100;
	}	

?>