<?php
session_start();
include "config.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Appointments</title>
    <style>
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
    <div class="container mt-5">
        <?php
        if (isset($_SESSION['nic'])) {
            $buyerNIC = $_SESSION['nic'];

            $sql = "SELECT * FROM appointments WHERE buyer_name = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $buyerNIC);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                ?>
                <h2>Your Appointments</h2>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Customer Name</th>
                            <th>Customer Mobile</th>
                            <th>Appointment Date/Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = $result->fetch_assoc()) {
                            $customerName = $row['customer_name'];
                            $customerMobile = $row['customer_mobile'];
                            $appointmentDate = $row['appointment_date'];
                            ?>
                            <tr>
                                <td><?php echo $customerName; ?></td>
                                <td><?php echo $customerMobile; ?></td>
                                <td><?php echo $appointmentDate; ?></td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
                <?php
            } else {
                    echo "<p>ගනුදෙනු දැකගත නොහැක.</p>";
                    }

        } else {
                        
            header("Location: index.php");
            exit();
         }
        ?>
        
    </div>
    <div class="btn-container">
            <a href="user.php" class="btn">Back</a>
    </div>
</body>
</html>


