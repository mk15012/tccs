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
  <link href="sweetalert.css" rel="stylesheet">

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

.table-hover tbody tr:hover td {
    background: lightgrey;
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
  <form class="form-inline" action="enquire_consignment.php" method="POST">
    <div class="form-group">
      <h5 style="color: white;">Consignment Id :</h5>
      <input type="text" class="form-control"  placeholder="Enter Consignment Id"  name="consignment_id">
    </div>
    <div class="form-group">

    </div>
    <div class="form-group">
      <h5 style="color: white;">Destination :</h5>
      <input type="text" class="form-control" placeholder="Enter Destination" name="receiver_address" required>
    </div>

    
    <div class="form-group">
      <h5 style="color: black;">c</h5>
      <button type="submit" class="btn btn-primary">View</button>
    </div>

    <div class="form-group">
      <h5 style="color: black;">c</h5>
      <a href="view_consignment_man.php" style="text-decoration: none;" class="btn btn-warning">Go Back</a>
    </div>

  </form>
</div>
</center>
</body>
</html> 