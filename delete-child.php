<?php 
	include "includes/sql_connection.php";


	$CHILD_ID	= $_GET['id'];

	$sql = "DELETE FROM tbl_child WHERE CHILD_ID = '$CHILD_ID' ";

	if ($conn->query($sql) === TRUE) {
 	 header("location: view-family.php?success=true&delete=true");
	} else {
 	 echo "Error: " . $sql . "<br>" . $conn->error;
	}


?>