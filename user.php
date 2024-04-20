<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" >
    <title>User Page</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            background-image: url('images/userlogin.jpg'); 
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

        .user-box {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        .user-box h1 {
            font-size: 36px;
            color: #333;
        }

        .user-box p {
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
        <div class="user-box">
            <h3>Welcome,</h3>
            <p>Welcome to Dabulla dedicated Economic Center</p>
            <div class="btn-container">
                <a href="buyer_appointments.php" class="btn">View Appoinments</a>
                <a href="logout.php" class="btn">log out</a>
            </div>
        </div>
    </div>    

    <!-- <div class="container">
        
        <div class="content">
            <h3>hello  <span>User</span></h3>
            <h1>welcome<span></span></h1>
            <p>Welcome to Dabulla dedicated Economic Center </p>
            <a href="buyer_appointments.php" class="btn">View Appoinments</a>
            <a href="logout.php" class="btn">log out</a>
        </div>
    </div> -->
</body>
</html>