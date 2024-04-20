<?php
include 'config.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $customer_name = $_POST['customer_name'];
    $customer_mobile = $_POST['customer_mobile'];
    $buyer_name = $_POST['buyer_name'];
    $appointment_date = $_POST['appointment_date'];

    
    $sql = "INSERT INTO appointments (customer_name, customer_mobile, buyer_name, appointment_date)
            VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssis", $customer_name, $customer_mobile, $buyer_name, $appointment_date);

    if ($stmt->execute()) {
        
        header("Location: success_page_user.php");
        exit();
    } else {
       
        header("Location: error_page.php"); 
        exit();
    }
} else {
    
    header("Location: appointment.php"); 
    exit();
}
?>
