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

<script src="js/change.js"></script>
<script src="js/change_rate.js"></script>

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

#header{
      width: 100%;
      height: 120px;
      background: black;
      color: white;
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

<?php
  $id = $_SESSION['id'];
  $query = "SELECT * FROM users WHERE id = $id";
  $result = mysqli_query($con,$query);

  $row = mysqli_fetch_assoc($result);
?>


<br><br>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-4" style="background-color:lavender;text-align: center;"><h4><strong>Personal Details</strong></h4>
    <br><br>
    <div class="container">
    
    <table class="table table-striped" style="width: 30%;">
    <thead>
    <tr>
      <th><th></th></th>
    </tr> 

    </thead>
    <tbody style="text-align: left; ">
      
      <tr>
        <td><h5>Employee Id :</h5></td>
        <td><h5><?php echo $row['user_id']?></h5></td>
      </tr>

      <tr>
        <td></td> 
        <td></td>
      </tr>

      <tr>
        <td><h5>First Name :</td>
        <td><h5><?php echo $row['first_name']?></td>
      </tr>

      <tr>
        <td></td> 
        <td></td>
      </tr>

      <tr>
        <td><h5>Date of Birth :</td>
        <td><h5><?php echo $row['dob']?></td>
      </tr>

      <tr>
        <td></td> 
        <td></td>
      </tr>

      <tr>
        <td><h5>Gender :</td>
        <td><h5><?php echo $row['gender']?></td>
      </tr>

      <tr>
        <td></td> 
        <td></td>
      </tr>

      <tr>
        <td><h5>Mobile Number :</td>
        <td><h5><?php echo $row['mobile']?></td>
      </tr>

      <tr>
        <td></td> 
        <td></td>
      </tr> 


    </tbody>
  </table>
</div>


    </div>
    
    <div class="col-md-4" style="background-color:lavenderblush;text-align: center;"><h4><strong>Address</strong></h4>

    <br><br>
    <div class="container">
  <table class="table table-striped" style="width: 30%">
    
    <thead>

    <tr>
      <th><th></th></th>
    </tr> 

    </thead>
    <tbody style="text-align: left; ">
      
      <tr>
        <td><h5>Address :</td>
        <td><h5><?php echo $row['address']?></td>
      </tr>

      <tr>
        <td></td> 
        <td></td>
      </tr>

      <tr>
        <td><h5>Pin Code :</td>
        <td><h5><?php echo $row['pincode']?></td>
      </tr>

      <tr>
        <td></td> 
        <td></td>
      </tr>

      <tr>
        <td><h5>City :</td>
        <td><h5><?php echo $row['city']?></td>
      </tr>

      <tr>
        <td></td> 
        <td></td>
      </tr>

      <tr>
        <td><h5>State :</td>
        <td><h5><?php echo $row['state']?></td>
      </tr>

      <tr>
        <td></td> 
        <td></td>
      </tr>

      <tr>
        <td><h5>Country :</td>
        <td><h5><?php echo $row['country']?></td>
      </tr>

      <tr>
        <td></td> 
        <td></td>
      </tr>


    </tbody>
  </table>
</div>

    </div>


    <div class="col-md-4" style="background-color:lavender;text-align: center;"><h4><strong>Change Password</strong></h4>

      <br><br>
    <div class="container">
  <table class="table table-striped" style="width: 30%">
    
    <thead>

    <tr>
      <th><th></th></th>
    </tr> 

    </thead>
    <tbody style="text-align: left; ">
      <!-- <form  action="#" method="POST"> -->
      <tr>
        <td><h5>New Password :</td>
        <td><h5><input type="password" id="newpsd" name="newpsd" required></td>
      </tr>

      <tr>
        <td></td> 
        <td></td>
      </tr>

      <tr>
        <td><h5>Re-Enter Password :</td>
        <td><h5><input type="password" id="rpsd" name="rpsd" required></td>
      </tr>

<!--       <tr>
        <td></td> 
        <td></td>
      </tr>
 -->
      <td>
        <input type="submit" class="btn btn-primary" id="change_btn" value="Change Password" style="line-height: 1.7;" required>
      </td>

    </tbody>
  </table>        

<br>

  <table class="table table-striped" style="width: 30%">
     
    <tbody style="text-align: left; ">
      <tr>
        <td><h5>Revenue Rate :</td>
        <td><h5><input type="text" id="revenue_rate" name="revenue_rate" required></td>

      </tr>
      
<!--       <tr>
        <td></td> 
        <td></td>
      </tr>
 -->

        <td>
          <input type="submit" class="btn btn-primary" id="change_rate" value="Change Rate" style="float: left; line-height: 1.7;">
        </td>


<!--       <tr>
        <td></td> 
      </tr> -->
    </tbody>
  </table>        
    
</body>
</html> 
