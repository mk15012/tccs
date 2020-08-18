<?php
include 'auth.php';
include 'config.php';

	if(isset($_POST['consignment_id']) and isset($_POST['sender']) and isset($_POST['sender_address']) and isset($_POST['receiver']) and isset($_POST['receiver_address']) and isset($_POST['volume']) )
	{
		$consignment_id = $_POST['consignment_id'];
		// echo $roll;

		$sender  = $_POST['sender'];
		// echo $first_name;
		
		$sender_address  = $_POST['sender_address'];
		// echo $last_name;
		$receiver  = $_POST['receiver'];
		
		$receiver_address = $_POST['receiver_address'];
		
		$volume  = $_POST['volume'];

		$id = $_SESSION['id'];

		$query1 = "SELECT * from users WHERE id = $id";
		$result1 = mysqli_query($con,$query1);

		$row = mysqli_fetch_assoc($result1);
		$ecode = $row['ecode'];
		$user_id = $row['user_id'];


		$temp = "SELECT * from users WHERE ecode = '$ecode' and identity = 2";
		$result_temp = mysqli_query($con,$temp);
		$row_temp = mysqli_fetch_assoc($result_temp);

		$rate = $row_temp['rate'];

		$revenue = $volume*$rate;

		$query = "INSERT INTO consignment_details (consignment_id,sender_name,sender_address,receiver_name,receiver_address,volume,order_date,revenue,user_id,ecode) VALUES ('$consignment_id','$sender','$sender_address','$receiver','$receiver_address','$volume',CURRENT_TIMESTAMP,'$revenue','$user_id','$ecode')";

		$result=mysqli_query($con,$query);
	
		$query2 = "SELECT count(*) FROM truck WHERE status = 1";
		$result2 =  mysqli_query($con,$query2);
				
		$row2 = mysqli_fetch_assoc($result2);
		$count = $row2['count(*)'];

		$loop = $volume/500;
		if($volume%500 != 0)
			$loop +=1;


		if($count >=$loop)
		{
			$query3 = "SELECT * FROM truck WHERE status = 1";
			$result3 =  mysqli_query($con,$query3);
				
			while(($row3 = mysqli_fetch_assoc($result3)) && $volume >0)
			{
				if($volume > 500)
				{
					$load = 500;
					$volume	-= 500;
					$truck_id = $row3['truck_id'];
					$query4 = "INSERT INTO consignment_truck VALUES('$consignment_id','$truck_id')";
					$result4 = mysqli_query($con,$query4);

					$query5 = "UPDATE truck SET status = 0 WHERE truck_id = '$truck_id'";
					$result5 = mysqli_query($con,$query5);
				}

				else
				{
					$truck_id = $row3['truck_id'];
					$query4 = "INSERT INTO consignment_truck VALUES('$consignment_id','$truck_id')";
					$result4 = mysqli_query($con,$query4);
					$volume = 0;

					$query5 = "UPDATE truck SET status = 0 WHERE truck_id = '$truck_id'";
					$result5 = mysqli_query($con,$query5);
						
					$query6 = "UPDATE consignment_details SET dispatch_date = CURRENT_TIMESTAMP WHERE consignment_id = '$consignment_id'";
					$result6 = mysqli_query($con,$query6);
					
				}
			}


		}

		header('Location: view_consignment_emp.php');

	}	

?>