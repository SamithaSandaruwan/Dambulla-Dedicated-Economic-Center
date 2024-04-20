<?php 
session_start(); 
include "config.php";

if (isset($_POST['nic']) && isset($_POST['password'])) {

    function validate($data){
       $data = trim($data);
       $data = stripslashes($data);
       $data = htmlspecialchars($data);
       return $data;
    }

    $nic = validate($_POST['nic']);
    $pass = validate($_POST['password']);

    if (empty($nic)) {
        header("Location: index.php?error=User NIC is required");
        exit();
    } else if (empty($pass)) {
        header("Location: index.php?error=Password is required");
        exit();
    } else {
        $sql = "SELECT * FROM users WHERE nic='$nic'";
        $result = mysqli_query($conn, $sql);

        if (!$result) {
            die("Query failed: " . mysqli_error($conn));
        }

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if (password_verify($pass, $row['password'])) {
                $_SESSION['nic'] = $row['nic'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['id'] = $row['id'];


                $updateStatusSQL = "UPDATE users SET status = 'available' WHERE nic = '$nic'";
                mysqli_query($conn, $updateStatusSQL);

                
                header("Location: user.php");


            } else {
                $error[] = 'Password Not Match';
                header("Location: password_not_match_user.php");
            }
        } else {
            $error[] = 'User not found';
            header("Location: user_not_found.php");
        }
    }
} else {
    header("Location: index.php");
    exit();
}
?>
