<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Make an Appointment</title>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
 
</head>
<body>
    <div class="container mt-5">
        <h2>Make an Appointment</h2>
        <form action="process_appointment.php" method="POST">
            <div class="form-group">
                <label for="customer_name">Your Name</label>
                <input type="text" class="form-control" id="customer_name" name="customer_name" required>
            </div>
            <div class="form-group">
                <label for="customer_mobile">Your Mobile Number</label>
                <input type="text" class="form-control" id="customer_mobile" name="customer_mobile" required>
            </div>

            <div class="form-group">
                <label for="buyer_name">Select a Buyer</label>
                <select class="form-control" id="buyer_name" name="buyer_name" required>
                    <option value="">Select a Buyer</option>
                    <?php
                    
                    include 'config.php'; 
                    $sql = "SELECT nic, name FROM users";
                    $result = $conn->query($sql);
                    while ($row = $result->fetch_assoc()) {
                        echo '<option value="' . $row['nic'] . '">' . $row['name'] . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="appointment_date">Appointment Date and Time</label>
                <input type="datetime-local" class="form-control" id="appointment_date" name="appointment_date" required>
            </div>
            <br>
            <br>
            <button type="submit" class="btn btn-success">Schedule Appointment</button>
            <br>
            <br>
            
        </form>
        <p class="mb-0">
        <a href="buyer_list_user.php">Back</a>
        </p>
    </div>
</body>
</html>
