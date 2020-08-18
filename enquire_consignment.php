<?php
include'config.php';
include 'auth.php';
?>


<!DOCTYPE html>
<html>
<head>

<script src="js/jquery.js"></script>
<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="js/bootstrap.min.js"></script>

<script src="js/sweetalert1.min.js"></script>
<script type="text/javascript">
  function showlogout() {
// console.log('clicked..!!!');
    swal({
  title: "Are you sure you want to logout?",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {

  if (willDelete) {
    swal("You are successfully logged out", {
      icon: "success",
    });

    setTimeout(function(){
      window.location="logout.php";
    },1000);
  }
  // else {
  //   swal("Happy to see you !!");
  // }
});
  }
</script>

<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Manager Panel</title>
  <link href="css/sweetalert.css" rel="stylesheet">

<style>
body {
  font-family: "Lato", sans-serif;
  background-color: black;
}

.sidenav {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.table-hover tbody tr:hover td {
    background: lightgrey;
}


.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

#header{
      width: 100%;
      height: 120px;
      background: black;
      color: white;
    }

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>
</head>
<body>

<div id="header">

<img src="images/admin.png" id="adminlogo" height="100px" width="100px" float : left></img>
<center><h1 style="margin-top : -4vw;">WELCOME MANAGER</h1></center>
</div>

<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="manager_panel.php">Dashboard</a>
  <a href="profile_man.php">Profile</a>
  <a href="view_employee_man.php">Employees</a>
  <a href="view_consignment_man.php">Consignments</a>
  <a href="view_truck_man.php">Trucks</a>
  <a href="#" id="logout_btn" onclick='showlogout()'>Log Out</a>
</div>

<span style="font-size:30px;cursor:pointer;color: white;" onclick="openNav()">&#9776;</span>

<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
</script>

<center>
<div class="container">
    <table class="table table-hover" style="color: white;">
    <thead>
      <tr>
        <th style="text-align: center;">Consignment Id</th>
        <th style="text-align: center;">Sender Name</th>
        <th style="text-align: center;">Sender Address</th>
        <th style="text-align: center;">Receiver Name</th>
        <th style="text-align: center;">Receiver Address</th>
        <th style="text-align: center;">Volume</th>
        <th style="text-align: center;">Order Date</th>
        <th style="text-align: center;">Dispatch Date</th>
        <th style="text-align: center;">Delivery Date</th>
        <th style="text-align: center;">Revenue</th>
        <th style="text-align: center;">Bill</th>
      </tr>
    </thead>
    <tbody>

      <?php

    $id = $_SESSION['id'];

    $query1 = "SELECT * FROM users WHERE id = $id";
    $result1 = mysqli_query($con,$query1);

    $row1 = mysqli_fetch_array($result1);
    $ecode = $row1['ecode'];

    if(isset($_POST['consignment_id']) and isset($_POST['receiver_address']))
    {

      $consignment_id = $_POST['consignment_id'];
      $receiver_address = $_POST['receiver_address'];

      $query = "SELECT * FROM consignment_details WHERE ecode = '$ecode' AND consignment_id = '$consignment_id' AND receiver_address = '$receiver_address'";
      $result = mysqli_query($con,$query);
    }

    else if(!(isset($_POST['consignment_id']) and isset($_POST['receiver_address'])))
    {
        $receiver_address = $_POST['receiver_address'];      
        
        $query = "SELECT * FROM consignment_details WHERE receiver_address = '$receiver_address'";
        $result = mysqli_query($con,$query);
    }



    while($row = mysqli_fetch_assoc($result))
    {
    ?>
         <tr style="text-align:center; color: black; background-color: white;" class="text-white">
            <td><?php echo $row['consignment_id']; ?></td>
            <td><?php echo $row['sender_name']; ?></td>
            <td><?php echo $row['sender_address']; ?></td>
            <td><?php echo $row['receiver_name']; ?></td>
            <td><?php echo $row['receiver_address']; ?></td>
            <td><?php echo $row['volume']; ?></td>
            <td><?php echo $row['order_date']; ?></td>
            <td><?php echo $row['dispatch_date']; ?></td>
            <td><?php echo $row['delivery_date']; ?></td>
            <td><?php echo $row['revenue']; ?></td>
            <td><form method="POST" action="bill.php">
            <input type="hidden" name="con_id" value="<?php echo $row['id']; ?>">
            <input type="submit" value="View" class="btn btn-primary" style="border: none;">
            </form>
            </td>

        </tr>
    <?php
  }
    ?>


    </tbody>
  </table>
</div>

<div class="form-group">
      <h5 style="color: black;"></h5>
      <a href="enquire_consignment_man.php" style="text-decoration: none; float: right; margin-right: 12.5vw; margin-top: 0.5vw;" class="btn btn-warning">Go Back</a>
    </div>
</body>
</html> 
