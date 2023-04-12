<?php

    
    $numberError = "";

    if(isset($_POST['submit'])){
        echo "<h3>Your Form has been Submitted</h3>"; 

        $numberOfItems = $_POST['numberOfItems'];
        
        if(is_numeric($numberOfItems)){
            $numberError = "";
        }
        else{
            $numberError = "Please input a number";
        }
    }
    else{

    }




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .errorMsg{
            color:red;
        }


    </style>
</head>
<body>
    <h1>WDV341 Intro PHP</h1>

    <form method="post" action="selfPostingForm.php">

        <div>
            <label for="numberOfItems">Number of Items: </label>
            <input type="text" name="numberOfItems" id="numberOfItems">
            <span class="errorMsg"><?php echo $numberError; ?></span>
        </div>

        <p>
            <input type="submit" value="Submit" name="submit">
            <input type="reset" value="Reset" name="reset">
        </p>    

    </form>
</body>
</html>