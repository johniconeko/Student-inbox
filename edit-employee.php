<?php 
	include "includes/sql_connection.php";


	$emp_id				= $_POST['emp_id'];
	$last_name			= $_POST['last_name'];
	$middle_name		= $_POST['middle_name'];
	$first_name			= $_POST['first_name'];
	$birth_date			= $_POST['birth_date'];
	$office_id			= $_POST['office_id'];


	$sql = "UPDATE tbl_employee 
					SET LAST_NAME 	= '$last_name',
						FIRST_NAME 	= '$first_name',
						MIDDLE_NAME = '$middle_name',
						BIRTH_DATE 	= '$birth_date',
						OFFICE_ID 	= '$office_id'
					WHERE EMP_ID 	= '$emp_id' ";

	if ($conn->query($sql) === TRUE) {
 	 header("location: employee.php?success=true&edit=true");
	} else {
 	 echo "Error: " . $sql . "<br>" . $conn->error;
	}


?>