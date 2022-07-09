<?php 
	include "includes/sql_connection.php";

	$LAST_NAME		= $_POST['last_name'];
	$FIRST_NAME		= $_POST['first_name'];
	$MIDDLE_NAME	= $_POST['middle_name'];
	$BIRTH_DATE		= $_POST['birth_date'];
	$OFFICE_ID		= $_POST['office_id'];

	$sql = "INSERT INTO tbl_employee(LAST_NAME, FIRST_NAME, MIDDLE_NAME, BIRTH_DATE, OFFICE_ID)
					VALUES('$LAST_NAME', '$FIRST_NAME', '$MIDDLE_NAME', '$BIRTH_DATE', '$OFFICE_ID')";

	if ($conn->query($sql) === TRUE) {
 	 header("location: employee.php?success=true");
	} else {
 	 echo "Error: " . $sql . "<br>" . $conn->error;
	}


?>