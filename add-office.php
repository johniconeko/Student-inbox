<?php 
	include "includes/sql_connection.php";

	$OFFICE_NAME			= $_POST['office_name'];
	$OFFICE_LOCATION		= $_POST['office_location'];


	$sql = "INSERT INTO tbl_office(OFFICE_NAME, OFFICE_LOCATION)
					VALUES('$OFFICE_NAME', '$OFFICE_LOCATION')";

	if ($conn->query($sql) === TRUE) {
 	 header("location: office.php?success=true");
	} else {
 	 echo "Error: " . $sql . "<br>" . $conn->error;
	}


?>