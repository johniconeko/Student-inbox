<?php
include "includes/sql_connection.php";
$username = $_POST['username'];
$password = md5($_POST['password']);


$sql = "SELECT USER_ID, PASSWORD FROM tbl_user where USERNAME='$username'";

	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
	    while($row = $result->fetch_assoc()){
	    	$password_db = $row['PASSWORD'];
	    	$emp_id = $row['USER_ID'];
	    }
	    
		if($password == $password_db){
			session_start();
			$_SESSION['USER_ID'] = $emp_id;
			header("Location: index.php");
		}else{
			header("Location: login.php?failed=true");
		}

	} else {
 	 	header("Location: login.php?failed=true");
	}



?>