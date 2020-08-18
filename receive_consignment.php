<?php
include 'auth.php';
include 'config.php';

	if(isset($_POST['con_id']))
	{

		$consignment_id = $_POST['con_id'];

		$query6 = "SELECT * FROM consignment_details WHERE consignment_id = '$consignment_id'";
		$result6 =  mysqli_query($con,$query6);

		$n = mysqli_num_rows($result6);

		if($n == 1)
		{
				$id = $_SESSION['id'];
				$query5 = "SELECT * FROM users WHERE id = $id";
				$result5 = mysqli_query($con,$query5);
				$row2 = mysqli_fetch_assoc($result5);

				$emp_ecode = $row2['ecode'];

				$row5 = mysqli_fetch_assoc($result6);
				$delivery_date = $row5['delivery_date'];
				if(	$delivery_date == NULL)
				{
						$query = "UPDATE consignment_details SET delivery_date = CURRENT_TIMESTAMP WHERE consignment_id = '$consignment_id'";
						$result = mysqli_query($con,$query);

						$query2 = "SELECT truck_id FROM consignment_truck WHERE consignment_id = '$consignment_id'";
						$result2 =  mysqli_query($con,$query2);
						
						while($row = mysqli_fetch_assoc($result2))
						{
							$truck_id = $row['truck_id'];
							$query3 = "SELECT * FROM truck WHERE truck_id = '$truck_id'";
							$result3 = mysqli_query($con,$query3);
							$row1 = mysqli_fetch_assoc($result3);

							$trips = $row1['trips'];
							$truck_ecode = $row1['ecode'];

							$query3 = "UPDATE truck SET trips = $trips + 1  WHERE truck_id = '$truck_id'";
							$result3 = mysqli_query($con,$query3);

							if($emp_ecode == $truck_ecode)
							{
								$query4 = "UPDATE truck SET status = 1 WHERE truck_id = '$truck_id'";
								$result4 = mysqli_query($con,$query4);
							}

						}
						echo 1;
				}

				else
					echo 2;
		}
		else
			echo 5;

	}

?>