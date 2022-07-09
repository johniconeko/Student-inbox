<?php 
	include "includes/sql_connection.php";


	$OFFICE_ID			= $_POST['office_id'];
	$OFFICE_NAME		= $_POST['office_name'];
	$OFFICE_LOCATION	= $_POST['office_location'];

	$sql = "UPDATE tbl_office 
				SET office_name 		= '$OFFICE_NAME', 
					office_location 	= '$OFFICE_LOCATION'
				WHERE office_id = '$OFFICE_ID' ";

	if ($conn->query($sql) === TRUE) {
 	 header("location: office.php?success=true&edit=true");
	} else {
 	 echo "Error: " . $sql . "<br>" . $conn->error;
	}


?>