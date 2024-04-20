<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ddec_user";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT name FROM admins WHERE role = 'admin' LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $adminName = $row["name"];
} else {
    $adminName = "Admin";
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Admin Page</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            background-image: url('images/admin/2.jpg'); 
            background-size: cover; 
            background-position: center; 
            background-repeat: no-repeat; 
    
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .admin-box {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        .admin-box h1 {
            font-size: 36px;
            color: #333;
        }

        .admin-box p {
            font-size: 18px;
            color: #555;
        }

        .btn-container {
            margin-top: 20px;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color:  #14dc3f;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            font-size: 18px;
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="admin-box">
            <h3>Welcome, <span><?php echo $adminName; ?></span></h3>
            <p>Welcome to the Admin Page</p>
            <div class="btn-container">
                <a href="buyer_list_admin.php" class="btn">View Buyers</a>
                <a href="register_form.php" class="btn">Add Buyer</a>
                <a href="logout.php" class="btn">Log Out</a>
            </div>
        </div>
    </div>
</body>
</html>
