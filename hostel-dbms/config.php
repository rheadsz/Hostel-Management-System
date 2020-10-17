<?php
$conn = new mysqli('localhost','root','','studentdb');
?>


echo"<script>window.location.href='dashboard.php'</script>";


mysql_connect("localhost","root","") or die("could not connect");
	mysql_select_db("studentdb") or die("That database could not be found");


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



if (isset($_GET['email_id'])){
	$email_id = $_GET['email_id'];
	$password = $_GET['password'];
	
	$conn = new mysqli('localhost','root','','studentdb');
	$userquery = mysqli_query("SELECT * FROM students WHERE email_id = $email_id ") or die("The query could not be completed");
	
	if (mysqli_num_rows($userquery) !=1 ){
		die("User couldnt be found");

	}
	while($row = mysqli_fetch_array($userquery, MYSQL_ASSOC)){
			$reg_no = $row['reg_no'];
			$first_name = $row['first_name']; 
			$middle_name = $row['middle_name'];
			$last_name = $row['last_name'];
			$email_id= $row['email_id'];
			$gender = $row['gender'];
			$contact_no = $row['contact_no'];
			
		}
		if($email_id != $email_id){
			die("There has been a fatal error ");
		} 
?>


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
LOGIN.PHP:

<?php
session_start(); //starting session
$error =''; //variable to store error message
if(isset($_POST['Login'])){
    if(empty($_POST['email_id']) || empty($_POST['password'])){
    $error = "Username or password is invalid";
    }
    else
    {
        //Define $email_id and $password
        $email_id = $_POST['email_id'];
        $password = $_POST['password'];

        //Establishing connection with server by passing server_name, user_id and password as a parameter
        $connection = mysql_connect("localhost","root","");

        //Tp protect MySql injection for security purpose
        $email_id = stripslashes($email_id);
        $password = stripslashes($password);
        $email_id = mysql_real_escape_string($email_id);
        $password = mysql_real_escape_string($password);

        //selecting database
        $db = mysql_select_db("studentdb", $connection);

        //SQL query to fetch information of registered users and finds user match
        $query = mysql_query("select * from students where password='$password' AND email_id='$email_id'", $connection);
        $rows = mysql_num_rows($query);
        if($rows == 1) {
            $_SESSION['email_id'] = $email_id; //Initializing session
            echo"<script>window.location.href='dashboard.php'</script>";//Redirecting to other page
        }else {
            $error = "Username or password is invalid";
        }
        mysql_close($connection); //Closing connection
    }
}
?>

SESSION>PHP:

<?php
//Establishing connection with server by passing server_name, user_id and password as a parameter
$connection = mysql_connect("localhost", "root","");

//selecting database
$db = mysql_select_db("studentdb", $connection);

session_start(); //starting session

//Storing session
$user_check = $_SESSION['email_id'];

//SQL query to Fetch Complete info of user
$ses_sql = mysql_query("select email_id from login students where email_id='$user_check'", $connection);
$row = mysql_fetch_assoc($ses_sql);
$login_session = $row['email_id'];

if(!isset($login_session)){
    mysql_close($connection);   //Close connection
    header('Location: index.php');  //Redirecting to home page
}
?>