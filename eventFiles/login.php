<?php

    if(isset($_POST['submit'])){
        echo "Form Submitted";

        $inUserName = $_POST['inUserName'];
        $inPassword = $_POST['inPassword'];

        require 'dbConnect.php';
        $sql = 'SELECT event_username, event_password FROM wdv341_event_users WHERE event_username = :username and event_password = :password';
    
        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':username', $inUserName);
        $stmt->bindParam(':password', $inPassword);

        $stmt->execute();
    
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $row = $stmt->fetch();

        if($row){
            echo "Valid Data";
            $errorMsg = "";

        }
        else{
            $errorMsg = "Invalid Username or Password";
        }
    
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Login</title>
    <style>
        span{
            color:red;
        }
    </style>
</head>
<body>
    <h1>Event Login System</h1>

    <form method="post" action="login.php">
        <span><?php echo $errorMsg ?></span>
        <p>
            <label for="inUserName">Username: </label>
            <input type="text" name="inUserName" id="inUserName" placeholder="Username" value="">
        </p>
        <p>
            <label for="inPassword">Password: </label>
            <input type="text" name="inPassword" id="inPassword" value="">
        </p>
        <input type="submit" name="submit" value="Submit">
        <input type="reset" value="Reset">
    </form>
</body>
</html>