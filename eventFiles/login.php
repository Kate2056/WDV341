<?php
    $errorMsg = ""; 
    $validuser = false;

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
            $errorMsg = "";
            $validuser = true;

        }
        else{
            $errorMsg = "Invalid Username or Password";
            $validuser = false;
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
    <?php
    if($validuser){
        echo "display admin";
    
    ?>
    <h2>Welcome to the Admin System</h2>
    <h3>You are signed in as: <?php echo $inUserName; ?></h3>
    <ul>
        <li>Enter new events</li>
        <li>Enter new event users</li>
        <li>Sign off</li>
    </ul>
    <?php
    }
    else{
        echo "display form";
       
    ?>
    <form method="post" action="login.php">
        <span><?php echo $errorMsg ?></span>
        <p>
            <label for="inUserName">Username: </label>
            <input type="text" name="inUserName" id="inUserName" placeholder="Username" value="">
        </p>
        <p>
            <label for="inPassword">Password: </label>
            <input type="password" name="inPassword" id="inPassword" value="">
        </p>
        <input type="submit" name="submit" value="Submit">
        <input type="reset" value="Reset">
    </form>
    <?php
    }
    ?>
</body>
</html>