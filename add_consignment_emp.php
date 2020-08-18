<?php
include 'auth.php';
include 'config.php';
?>

<!DOCTYPE html>
<html>
<head>
  <title>Add Consignment</title>
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
<center><h1 style="margin-top : -4vw;">WELCOME EMPLOYEE</h1></center>
</div>

<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="employee_panel.php">Dashboard</a>
  <a href="profile_emp.php">Profile</a>
  <a href="view_consignment_emp.php">Consignment Details</a>
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

<form class="form-horizontal" action="add_consignment.php" style="max-width: 60%; margin-left: 22vw;" method="POST">

  <div class="form-group">
    <label class="control-label col-sm-2" for="consignment_id" style="color: white;">Consignment Id :</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="consignment_id" id="consignment_id" placeholder="Enter Consignment Id" required>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="sender" style="color: white;">Sender Name :</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="sender" name="sender" placeholder="Enter Sender Name" required>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="sender_address" style="color: white;">Sender Address :</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="sender_address" name="sender_address" placeholder="Enter Sender Address" required>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="receiver" style="color: white;">Receiver Name:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="receiver" name="receiver" placeholder="Enter Receiver Name" required>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="receiver_address" style="color: white;">Receiver Address :</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="receiver_address" id="receiver_address" placeholder="Enter Receiver Address" required>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="volume" style="color: white;">Volume :</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="volume" name="volume" placeholder="Enter Volume" required>
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-success">Submit</button>
      <button type="Reset" class="btn btn-primary">Reset</button>
      <button class="btn btn-warning"><a href="view_consignment_emp.php" style="text-decoration: none; color: white;">  Go Back</a></button>
    </div>
  </div>
</form>
  
</body>
</html> 