<?php
//Create a function that will accept a timestamp and format it into mm/dd/yyyy format.
    function formatDate($timestamp){
        $timestamp = date_format($timestamp, "m/d/Y");
        echo "<p>$timestamp</p>";
    }
//Create a function that will accept a timestamp and format it into dd/mm/yyyy format to use when working with international dates.
    function formatInternationalDate($timestamp){
        $timestamp = date_format($timestamp, "d/m/Y");
        echo "<p>$timestamp</p>";
    }
//Create a function that will accept a string input.  It will do the following things to the string:
    //Display the number of characters in the string
    //Trim any leading or trailing whitespace
    //Display the string as all lowercase characters
    //Will display whether or not the string contains "DMACC" either upper or lowercase
    function stringFunction($string){
        $stringLength = strlen($string);
        echo "<p>$stringLength</p>";
        $string = trim($string);
        echo "<p>$string</p>";
        $string = strtolower($string);
        echo "<p>$string</p>";
        if($string == "dmacc"){
            echo "<p>Yes</p>";
        } else {
            echo "<p>No</p>";
        }
    }
//Create a function that will accept a number and display it as a formatted phone number.   Use 1234567890 for your testing.
    function formatPhoneNumber($numberToFormat){
        if(strlen($numberToFormat) == 11){
            $formattedNumber = "+".substr($numberToFormat, 0, 1)." ".substr($numberToFormat, 1, -7)."-".substr($numberToFormat, 4, -4)."-".substr($numberToFormat, 7);
                echo "<p>$formattedNumber</p>";
        } else if(strlen($numberToFormat) == 10){
            $formattedNumber = substr($numberToFormat, 0, 3)."-".substr($numberToFormat, 3, -4)."-".substr($numberToFormat, 6, 9);
                echo "<p>$formattedNumber</p>";
        } else echo "<p>Not A Valid Phone Number</p>";

    }
//Create a function that will accept a number and display it as US currency with a dollar sign.  Use 123456 for your testing.
    function formatCurrency($numberToFormat){
        $numberToFormat = "$".$numberToFormat;
        echo "<p>$numberToFormat</p>";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Functions</title>
</head>
<body>
    <h1>WDV341 Intro PHP</h1>
    <h3>PHP Functions</h3>
    <strong>Formated Date:</strong> <?php formatDate(date_create())?>
    <strong>International Formated Date: </strong> <?php formatInternationalDate(date_create());?>
    <strong>String Function (DMACC): </strong><?php stringFunction("DMACC");?>
    <strong>Phone Number (1234567890): </strong><?php formatPhoneNumber("1234567890");?>
    <strong>Currency (123456): </strong><?php formatCurrency("123456");?>
</body>
</html>
