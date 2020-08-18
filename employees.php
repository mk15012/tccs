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
<center><h1 style="margin-top : -4vw;">WELCOME ADMIN</h1></center>
</div>


<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="admin_panel.php">Dashboard</a>
  <a href="profile_admin.php">Profile</a>
  <a href="employees.php">Users</a>
  <a href="view_all_consignment.php">Consignment Details</a>
  <a href="truck.php">Trucks</a>
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
  
    <i>
      <input type="text" id="myInput" style="float: right;" onkeyup="myFunction()" placeholder="Search" >
    </i>  

    <table id="myTable" class="table table-hover" style="color: white;">
    <thead>
      <tr>
        <th style="text-align: center;">Employee Id</th>
        <th style="text-align: center;">Name</th>
        <!-- <th style="text-align: center;">Last Name</th> -->
        <th style="text-align: center;">Date of Birth</th>
        <th style="text-align: center;">Gender</th>
        <th style="text-align: center;">Mobile</th>
        <th style="text-align: center;">Address</th>
        <th style="text-align: center;">Pincode</th>
        <th style="text-align: center;">City</th>
        <th style="text-align: center;">State</th>
        <th style="text-align: center;">Country</th>
        <th style="text-align: center;">Identity</th>
        <th style="text-align: center;">Rate</th>

      </tr>
    </thead>
    <tbody>

    <?php

    $query = "SELECT * FROM users";
    $result = mysqli_query($con,$query);

    while($row = mysqli_fetch_assoc($result))
    {
    ?>
         <tr style="text-align:center; color: black; background-color: white;" class="text-white">
            <td><?php echo $row['user_id']; ?></td>
            <td><?php echo $row['first_name']?><?php echo " "?><?php echo $row['last_name']; ?></td>
            <!-- <td><?php echo $row['last_name']; ?></td> -->
            <td><?php echo $row['dob']; ?></td>
            <td><?php echo $row['gender']; ?></td>
            <td><?php echo $row['mobile']; ?></td>
            <td><?php echo $row['address']; ?></td>
            <td><?php echo $row['pincode']; ?></td>
            <td><?php echo $row['city']; ?></td>
            <td><?php echo $row['state']; ?></td>
            <td><?php echo $row['country']; ?></td>
            <td>
            <?php
            $identity = $row['identity'];

            if($identity == 3)
            echo "Administrator";

            else if($identity == 2)
            echo "Manager";

            else if($identity == 1)
            echo "Employee";

            else
            echo "Driver";
            ?>
            </td>
            <td><?php echo $row['rate']; ?></td>
        </tr>
    <?php
    }
    ?>

    </tbody>
  </table>
</div>

</body>

<script>

function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {

    var temp=0;
    for (var j = 0; j < 13; j++) {
      td = tr[i].getElementsByTagName("td")[j];

    
        if (td) {
          txtValue = td.textContent || td.innerText;
          if (txtValue.toUpperCase().indexOf(filter) > -1 && temp==0) {
            tr[i].style.display = "";
            temp=temp+1;
          } else {
            if(temp==0)
              tr[i].style.display = "none";
          }
        }       
    }
  }
}

 </script>

</html> 
