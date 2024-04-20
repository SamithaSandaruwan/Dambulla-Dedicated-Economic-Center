<?php
session_start();

if (isset($_SESSION['nic'])) {
    $buyerNIC = $_SESSION['nic'];
    include 'config.php';

   
    $updateStatusSQL = "UPDATE users SET status = 'not available' WHERE nic = '$buyerNIC'";
    mysqli_query($conn, $updateStatusSQL);


    session_unset();
    session_destroy();
    header("Location: index.php"); 
    exit();
} else {

    header("Location: index.php"); 
    exit();
}
?>
