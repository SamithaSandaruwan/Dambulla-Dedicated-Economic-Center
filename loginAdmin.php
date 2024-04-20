<?php 
session_start(); 
include "config.php";

if (isset($_POST['email']) && isset($_POST['password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$mail = validate($_POST['email']);
	$pass = validate($_POST['password']);

	if (empty($mail)) {
		header("Location: index.php?error=User Name is required");
	    exit();
	}else if(empty($pass)){
        header("Location: index.php?error=Password is required");
	    exit();
	}else{
		$sql = "SELECT * FROM admins WHERE email='$mail' AND password='$pass'";

		$result = mysqli_query($conn, $sql);
        if (!$result) {
            die("Query failed: " . mysqli_error($conn));
        }

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['email'] === $mail && $row['password'] === $pass) {
            	$_SESSION['email'] = $row['email'];
            	$_SESSION['name'] = $row['name'];
            	$_SESSION['id'] = $row['id'];
            	header("Location: admin.php");
		        
            }else{
                $error[]='Admin Not Found';
		        header("Location: admin_not_found.php");
			}
		}else{
            $error[]='Password Not Match';
	        header("Location: password_not_match_admin.php");
		}
	}
	
}else{

	header("Location: index.php");
	exit();
}
?>