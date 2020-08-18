<?php
include 'config.php';

	if(isset($_POST['userid']) and isset($_POST['ecode']) and isset($_POST['password']) and isset($_POST['cpassword']))
	{
		$userid = $_POST['userid'];
		$ecode = $_POST['ecode'];	
		$password = $_POST['password'];
		$cpassword = $_POST['cpassword'];
		

		if($password==$cpassword)
		{
			$check = "SELECT * from users WHERE user_id = '$userid' ";
			$res = mysqli_query($con,$check);
			
			if($res)
			{
				$row = mysqli_fetch_array($res, MYSQLI_ASSOC);
				$pass= $row['ecode'];
				if($pass == $ecode)
				{
					$query = "UPDATE users SET password ='$password' WHERE user_id='$userid' ";
					$result = mysqli_query($con,$query);
					if($result)
						echo 1;
				}

				else
					echo 2;
			}

			else
				echo 2;
		}
		
		else
			echo 0;
	}

?>