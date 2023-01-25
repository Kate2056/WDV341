<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Basics</title>
</head>
<body>
    <h1>WDV341 Intro PHP</h1>
    <h3>3-1 PHP Basics</h3>
   <?php 
        $yourName = "Kaitlyn Briggs";
        echo "<h1> $yourName </h1>";
        $number1 = 7;
        $number2 = 8;
        $total = $number1 + $number2;
        echo "<p>$number1 + $number2 = $total</p>";
        $myArray = array("PHP", "HTML", "Javascript");
        echo "<script>let myArray = [];</script>";
        $counter = 0;
        foreach ($myArray as $value){
            echo "<script>myArray[$counter] = '$value';</script>";
            $counter++;
        };
    ?>
<h2><?php echo $yourName; ?></h2>
<script>

    console.log(myArray);
    document.write(myArray);
</script>

</body>
</html>