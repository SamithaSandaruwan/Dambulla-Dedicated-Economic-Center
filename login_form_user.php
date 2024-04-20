<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" >
    <title>login Page</title>
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
    </style>
</head>
<body>
    <div class="form-container">
        <form action="loginBuyer.php" method="POST">

             <?php
                 if(isset($error)){
                foreach($error as $error){
                    echo '<sapn class="error-msg">'.$error.'</span>';
                };
                };
             ?>
            <input type="text" name="nic" required placeholder="Enter your NIC number">
            <input type="text" name="password" required placeholder="Enter your password">
            <input type="submit" name="submit" value="Login Now" class="form-btn">
            <p></p>
            <p><a href="index.php" class="btn">Back</a></p>
            </form>


    </div>
</body>
</html>