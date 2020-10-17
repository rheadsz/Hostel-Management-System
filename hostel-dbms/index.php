<?php 
session_start();


$conn = mysqli_connect("localhost","root","","studentdb");
$error="";
$success="";
if(isset($_POST['Login'])){
   $email_id=$_POST['email_id'];
   $password=$_POST['password'];
  
   $select="select * from students where email_id = '$email_id' and password='$password'";
   $run=$conn->query($select);
   if($run->num_rows>0){
      while($row=$run->fetch_array()){
         $_SESSION['email_id']=$email_id=$row['email_id'];
         $_SESSION['password']=$user_email=$row['password'];
       
         echo"<script>window.location.href='dashboard.php'</script>";
         
      }
   }
   else{
      $error="Invalid Email or Password! Try again";
   }
 }
 ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <title>User login</title>
</head>
<body>
    <div class="wrapper">
        <div class="sidebar">
            <h2>Hostel Management System</h2>
            <ul>
                <li><a href="studentRegistration.html"><i class="fas fa-home"></i>User Registration</a></li>
                <li><a href="index.php"><i class="fas fa-user"></i>User Login</a></li>
                <li><a href="adminProfile.html"><i class="fas fa-address-card"></i>Admin Login</a></li>
            </ul> 
        </div>

        


        <div class="main_content">
            <div class="header">User Login</div>  
            <form  action="" method="POST" >
                <div class="imgcontainer">
                  <img src="userlogin.png" alt="Avatar" class="avatar">
                </div>
              
                <div class="container">
                  <label for="email_id"><b>Email Id</b></label>
                  <input type="text" placeholder="Enter email" name="email_id" required><br>


              
                  <label for="password"><b>Password</b></label>
                  <input type="password" placeholder="Enter Password" name="password" required><br>
              
                  <button type="submit" class="btn btn-primary" name="Login">Login</button>
                  <label>
                    <input type="checkbox" checked="checked" name="remember"> Remember me
                  </label>
                </div>
              
                <div class="container" style="background-color:#f1f1f1">
                  <button type="button" class="cancelbtn">Cancel</button>
                 
                  <span class="psw">Forgot <a href="forgotpwd.html">password?</a></span>
                </div>
              </form>
        </div>
    </div>   
    
</body>
</html>
