<?php
    require "dbConnect.php";
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT name, description FROM wdv341_events";

    $stmt = $conn->prepare($sql);

    $stmt->execute();

    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    while($row = $stmt->fetch()){
        echo "<br>";
        echo "<b>" . $row["name"] . ": </b><em>"  . $row["description"] . "</em>";
    }
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>WDV341 Intro Php</h1>
    <h2>Select Example</h2>
</body>
</html>