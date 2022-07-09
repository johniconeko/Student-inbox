<?php 
	include "includes/sql_connection.php";


	$EMP_ID	= $_GET['id'];

	$sql = "DELETE FROM tbl_employee WHERE EMP_ID = '$EMP_ID' ";

	if ($conn->query($sql) === TRUE) {
 	 header("location: employee.php?success=true&delete=true");
	} else {
 	 echo "Error: " . $sql . "<br>" . $conn->error;
	}


?>