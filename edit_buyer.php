<?php
include 'config.php';

$name = '';
$nic = '';
$password = '';
$cpassword = '';
$mobileNumber = '';
$section = '';
$errorMessage = '';
$successMessage = '';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (!isset($_GET["nic"])) {
        header("location: buyer_list_admin.php");
        exit;
    }

    $nic = $_GET["nic"];

    $sql = "SELECT * FROM users WHERE nic = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $nic);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if (!$row) {
        header("location: buyer_list_admin.php");
        exit;
    }

    $name = $row['name'];
    $nic = $row['nic'];
    $mobileNumber = $row['mobile_number'];
    $section = $row['section'];
} else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $nic = $_POST['nic'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $mobileNumber = $_POST['mobile_number'];
    $section = $_POST['section'];

    if (empty($name) || empty($nic) || empty($password) || empty($cpassword) || empty($mobileNumber) || empty($section)) {
        $errorMessage = "All fields are required";
    } else if ($password !== $cpassword) {
        $errorMessage = "Passwords do not match";
    } else {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $sql = "UPDATE users SET name = ?, nic = ?, password = ?, mobile_number = ?, section = ? WHERE nic = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssss", $name, $nic, $hashedPassword, $mobileNumber, $section, $nic);

        if ($stmt->execute()) {
            $successMessage = "Buyer updated successfully";
            header("location: buyer_list_admin.php");
            exit;
        } else {
            $errorMessage = "Invalid query: " . $conn->error;
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
    <title>Edit buyer</title>
</head>
<body>
    <div class="form-container">
        <form method="POST">
            <input type="hidden" name="nic" value="<?php echo htmlspecialchars($nic); ?>">
            <h3>Edit Buyer</h3>

            <?php
            if (isset($errorMessage)) {
                echo '<span class="error-msg">' . $errorMessage . '</span>';
            }
            if (isset($successMessage)) {
                echo '<span class="success-msg">' . $successMessage . '</span>';
            }
            ?>

            <input type="text" name="name" required placeholder="Enter your name" value="<?php echo htmlspecialchars($name); ?>">
            <input type="text" name="nic" required placeholder="Enter your NIC number" value="<?php echo htmlspecialchars($nic); ?>">
            <input type="text" name="mobile_number" required placeholder="Enter your mobile number" value="<?php echo htmlspecialchars($mobileNumber); ?>">
            <input type="password" name="password" placeholder="Enter new password">
            <input type="password" name="cpassword" placeholder="Confirm new password">

            <select name="section">
                <option value="A" <?php if ($section === 'A') echo 'selected'; ?>>Section A</option>
                <option value="B" <?php if ($section === 'B') echo 'selected'; ?>>Section B</option>
            </select>
            <input type="submit" name="submit" value="Update" class="form-btn">
            <p></p>
            <a href="admin.php" class="btn">Back</a>
        </form>
    </div>
</body>
</html>
