<?php
include'config.php';
?>

<!DOCTYPE html>
<html>
<head>

<title>Password Recovery</title>
  
<script src="js/jquery.js"></script>
<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="js/bootstrap.js"></script>

<script src="js/sweetalert1.min.js"></script>
<script src="js/change_password.js"></script>

<link rel="stylesheet" type="text/css" href="css/global.css">

</head>
<body>
<center>
<div class="container">
    <div class="card" style="margin-top: 10%">
      <div class="card-header">
        <h3>FORGOT PASSWORD</h3>
      </div>
      <div class="card-body">
        
          <div class="input-field" style="width: 85%; background-color: #FFFFFF;margin-left: auto; margin-right: auto; margin-top:30px; border-radius: 5px; height: 37px;">
            <span class="glyphicon glyphicon-user" style="margin-right: 130px;">
              <input type="text"  name="userid" id="userid" placeholder="Username" style="border: none; height: 35px;" required>
            </span>
          </div>


          <div class="input-field" style="width: 85%; background-color: #FFFFFF;margin-left: auto; margin-right: auto; margin-top:30px; border-radius: 5px; height: 37px;">
            <span class="glyphicon glyphicon-magnet" style="margin-right: 130px;">
              <input type="password"  name="ecode" id="ecode" placeholder="Ecode" style="border: none; height: 35px;" required>
            </span>
          </div>

          <div class="input-field" style="width: 85%; background-color: #FFFFFF;margin-left: auto; margin-right: auto; margin-top: 30px; border-radius: 5px; height: 37px;">
            <span class="glyphicon glyphicon-lock" style="margin-right: 130px;">
              <input type="password" name="password" id="password" placeholder="New Password"  style="border: none; height: 35px; required">
            </span>
          </div>

           <div class="input-field" style="width: 85%; background-color: #FFFFFF;margin-left: auto; margin-right: auto; margin-top: 30px; border-radius: 5px; height: 37px;">
            <span class="glyphicon glyphicon-lock" style="margin-right: 130px;">
              <input type="password" name="cpassword" id="cpassword" placeholder="Confirm Password" style="border: none; height: 35px;" required>
            </span>
          </div>

          <br>
          <div class="form-group" style="text-align: left; margin-left: 30px;">
            <input type="submit" value="Update" id="update" class="btn btn-success" >
            <input type="reset" value="Reset" class="btn btn-primary" >
      	    <button type="submit" class="btn btn-warning" ><a href="index.html" style="text-decoration: none; color: black;">Go Back</a></button>
       
          </div>

      </div>
      
    </div>
</div>
</body>
</head>
</html>