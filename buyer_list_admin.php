<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Buyer List</title>
</head>
<body style="margin: 50px;">
    <h1 style="text-align: center;">List of Buyers</h1>
    <br>
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Name</th>
            <th scope="col">NIC number</th>
            <th scope="col">Mobile Number</th>
            <th scope="col">Section</th>
            <th scope="col">Status</th>
            <th scope="col">Created Time</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
            <?php 
        
            $db_host = "localhost";
            $db_username = "root";
            $db_password = "";
            $db_name = "ddec_user";

            
            $conn = mysqli_connect($db_host, $db_username, $db_password, $db_name);

           
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            $sql = "SELECT * FROM users";

            $result = mysqli_query($conn, $sql);

            if (!$result) {
                die("Query failed: " . mysqli_error($conn));
            }

            while ($row = mysqli_fetch_assoc($result)) {
                echo "
                <tr>
                <td>" . $row["name"] . "</td>
                <td>" . $row["nic"] . "</td>
                <td>" . $row["mobile_number"] . "</td>
                <td>" . $row["section"] . "</td>
                <td>" . $row["status"] . "</td>
                <td>" . $row["created_time"] . "</td>
                <td>
                    <a class='btn btn-primary btn-sm' href='edit_buyer.php?nic=$row[nic]'>Edit</a>

                    <a class='btn btn-danger btn-sm' href='delete_buyer.php?nic=$row[nic]'>Delete</a>
                </td>
                </tr>";
            }

            mysqli_close($conn);
            ?>
        </tbody>
        
    </table>
    <br>
    <br>
        <a class='btn btn-primary btn-sm' href="admin.php" class="btn" style="float: right;">Back</a>
        <a class='btn btn-primary btn-sm'href="register_form.php" >Add Buyer</a></span>

    
    
</body>
</html>
