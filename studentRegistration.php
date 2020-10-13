<?php


$reg_no = $_POST['reg_no'];
$first_name = $_POST['first_name'];
$middle_name = $_POST['middle_name'];
$last_name = $_POST['last_name'];
$gender = $_POST['gender'];
$contact_no = $_POST['contact_no'];
$email_id = $_POST['email_id'];
$password = $_POST['password'];
$retype_password = $_POST['retype_password'];

//database connection

$conn = new mysqli('localhost','root','','studentdb');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into students(reg_no,first_name, middle_name,last_name, gender,contact_no, email_id, password, retype_password) values(?, ?, ?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("issssisss", $reg_no, $first_name, $middle_name, $last_name, $gender, $contact_no, $email_id, $password, $retype_password);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfull...";
		$stmt->close();
		$conn->close();
	}

?>