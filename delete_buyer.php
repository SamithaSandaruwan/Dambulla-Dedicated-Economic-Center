<?php
include 'config.php';

if (isset($_GET['nic'])) {
    $nic = $_GET["nic"];

        $sql = "DELETE FROM users WHERE nic = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $nic);

        if ($stmt->execute()) {
            
            header("location: success_page_admin.php");
            exit;
        } else {
            
            echo "Error: " . $conn->error;
        }

    }

?>
