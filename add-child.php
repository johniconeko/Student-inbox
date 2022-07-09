<?php 
	include "includes/sql_connection.php";

	$LAST_NAME		= $_POST['last_name'];
	$FIRST_NAME		= $_POST['first_name'];
	$MIDDLE_NAME	= $_POST['middle_name'];
	$BIRTH_DATE		= $_POST['birth_date'];
	$PARENT_ID		= $_POST['parent_id'];



	$sql = "INSERT INTO tbl_child(LAST_NAME, FIRST_NAME, MIDDLE_NAME, BIRTH_DATE)
					VALUES('$LAST_NAME', '$FIRST_NAME', '$MIDDLE_NAME', '$BIRTH_DATE')";

	if ($conn->query($sql) === TRUE) {
		$CHILD_ID = $conn->insert_id;
 		$sql1 = "INSERT INTO tbl_family(PARENT_ID, CHILD_ID)
 					VALUES('$PARENT_ID', '$CHILD_ID')";
			
 			if ($conn->query($sql1) === TRUE) {
 			 header("location: view-family.php?success=true&parent_id=".$PARENT_ID);
 			}
	} else {
 	 echo "Error: " . $sql . "<br>" . $conn->error;
	}


?>