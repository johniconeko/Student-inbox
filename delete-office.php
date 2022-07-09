<?php 
	include "includes/sql_connection.php";


	$OFFICE_ID	= $_GET['id'];

	$sql = "DELETE FROM tbl_office WHERE OFFICE_ID = '$OFFICE_ID' ";

	if ($conn->query($sql) === TRUE) {
 	 header("location: office.php?success=true&delete=true");
	} else {
 	 echo "Error: " . $sql . "<br>" . $conn->error;
	}


?>