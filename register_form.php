<?php
include 'config.php';

$name = '';
$nic = '';
$password = '';
$cpassword = '';
$mobileNumber = '';
$section = '';
$errors = array();

if (isset($_POST['submit'])) {
    
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $nic = mysqli_real_escape_string($conn, $_POST['nic']);
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $mobileNumber = mysqli_real_escape_string($conn, $_POST['mobile_number']);
    $section = $_POST['section'];

    
    $select = "SELECT * FROM users WHERE nic = '$nic'";
    $result = mysqli_query($conn, $select);

    if (mysqli_num_rows($result) > 0) {
        $errors[] = 'User already exists!';
    } else {
        if ($password !== $cpassword) {
            $errors[] = 'Passwords do not match';
        } else {
            
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            
            $insert = "INSERT INTO users (name, nic, password, mobile_number, section) 
                       VALUES ('$name', '$nic', '$hashedPassword', '$mobileNumber', '$section')";

            if (mysqli_query($conn, $insert)) {
                header("location: success_page_admin.php");
                exit; 
            } else {
                $errors[] = 'Error inserting user: ' . mysqli_error($conn);
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <title>User Page</title>
</head>
<body>
    <div class="form-container">
        <form action="" method="POST">
            <h3>Register Buyer</h3>

            <?php
            if (!empty($errors)) {
                foreach ($errors as $errorMsg) {
                    echo '<span class="error-msg">' . $errorMsg . '</span>';
                }
            }
            ?>

            <input type="text" name="name" required placeholder="Enter your name" value="<?php echo htmlspecialchars($name); ?>">
            <input type="text" name="nic" required placeholder="Enter your NIC number" value="<?php echo htmlspecialchars($nic); ?>">
            <input type="password" name="password" required placeholder="Enter your password">
            <input type="password" name="cpassword" required placeholder="Confirm your password">
            <input type="text" name="mobile_number" required placeholder="Enter your mobile number" value="<?php echo htmlspecialchars($mobileNumber); ?>">
            <select name="section">
                <option value="A">Section A</option>
                <option value="B">Section B</option>
            </select>
            <input type="submit" name="submit" value="Register" class="form-btn">
            <p></p>
            <a href="admin.php" class="btn">Back</a>
        </form>
    </div>
</body>
</html>
