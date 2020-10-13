<html>
	<head>	
		<title><?php echo $first_name; ?> <?php echo $last_name; ?>'s Profile</title>
	</head>
<body>


<h2><?php echo $first_name; ?> <?php echo $last_name; ?>'s Profile</h2><br>
<?php
include("header.html");
include("sidebar.html");
?>
<table>
		<tr><td>Register Number: </td><td><?php echo $reg_no; ?></td></tr>
		<tr><td>First Name: </td><td><?php echo $first_name; ?></td></tr>
		<tr><td>Middle Name: </td><td><?php echo $middle_name; ?></td></tr>
		<tr><td>Last Name: </td><td><?php echo $last_name; ?></td></tr>
		<tr><td>Email Id: </td><td><?php echo $email_id; ?></td></tr>
		<tr><td>Gender: </td><td><?php echo $gender; ?></td></tr>
		<tr><td>Contact Number: </td><td><?php echo $contact_no; ?></td></tr>

</table>



</body>
</html>