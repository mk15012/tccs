<?php
include 'auth.php';
include 'config.php';
?>


<!DOCTYPE html>
<html>
<head>
	<title>Add Employee</title>

<script src="js/jquery.js"></script>
<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="js/bootstrap.min.js"></script>
<script src="js/sweetalert1.min.js"></script>

<meta name="viewport" content="width=device-width, initial-scale=1">

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

.table-hover tbody tr:hover td {
    background: lightgrey;
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
<!-- <center><h1 style="margin-top : -4vw;">WELCOME MANAGER</h1></center> -->
<center><h2 style="margin-top : -4vw; color: white;">Enter Employee Details</h2></center>
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

<!-- <center> -->
<form class="form-horizontal" action="add_employee.php" style="max-width: 60%; margin-left: 22vw;" method="POST">

  <div class="form-group">
    <label class="control-label col-sm-2" for="user_id" style="color: white;">Employee Id :</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="user_id" id="user_id" placeholder="Enter Employee Id" required>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="first_name" style="color: white;">First Name :</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter First Name" required>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="last_name" style="color: white;">Last Name :</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter Last Name" required>
    </div>
  </div>

    <div class="form-group">
    <label class="control-label col-sm-2" for="password" style="color: white;">Password :</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" required>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="dob" style="color: white;">Date Of Birth :</label>
    <div class="col-sm-10">
      <input type="date" class="form-control" id="dob" name="dob" placeholder="Enter Date of Birth" required>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="gender" style="color: white;">Gender :</label>
    <div class="col-sm-10" style="color: white;">
      <input type="radio" name="gender" value="Male">Male<input type="radio" name="gender" value="Female">Female<input type="radio" name="gender" value="Others">Others 
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="mobile" style="color: white;">Mobile Number :</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Enter Mobile Number" required>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="address" style="color: white;">Address :</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="address" id="address" placeholder="Enter Address" required>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="pincode" style="color: white;">Pin Code :</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="pincode" name="pincode" placeholder="Enter Pincode" required>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="city" style="color: white;">City :</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="city" name="city" placeholder="Enter City" required>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="state" style="color: white;">State :</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="state" name="state" placeholder="Enter State" required>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="country" style="color: white;">Country :</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="country" name="country" placeholder="Enter Country" required>
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-success">Submit</button>
      <button type="Reset" class="btn btn-primary">Reset</button>
      <button class="btn btn-warning"><a href="view_employee_man.php" style="text-decoration: none; color: white;">  Go Back</a></button>
    </div>
  </div>
</form>
</body>
</html> 
