<?php 
	include "includes/sql_connection.php";

	

	$PARENT_ID			= $_POST['parent_id'];
	$CHILD_ID			= $_POST['child_id'];
	$LAST_NAME			= $_POST['last_name'];
	$MIDDLE_NAME		= $_POST['middle_name'];
	$FIRST_NAME			= $_POST['first_name'];
	$BIRTH_DATE			= $_POST['birth_date'];


	$sql = "UPDATE tbl_child 
					SET last_name 	= '$LAST_NAME',
						first_name 	= '$FIRST_NAME',
						middle_name = '$MIDDLE_NAME',
						birth_date 	= '$BIRTH_DATE'
					WHERE child_id 	= '$CHILD_ID' ";

	if ($conn->query($sql) === TRUE) {
 	 header("location: view-family.php?success=true&edit=true&parent_id=".$PARENT_ID);
	} else { 
 	 echo "Error: " . $sql . "<br>" . $conn->error;
	}


?>