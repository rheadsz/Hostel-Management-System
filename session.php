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
    mysql_close($connection);
    header('Location: index.php');
}
?>
