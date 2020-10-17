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
         echo"<script>window.location.href='my-profile.php'</script>";
         
      }
   }
   else{
      $error="Invalid Email or Password! Try again";
   }
 }
 ?>