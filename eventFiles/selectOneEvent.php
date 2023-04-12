
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
         table, tr, td{
            border:2px solid black;
        }

        tr, td{
            padding:5px;
        }
    </style>
</head>
<body>
    <h1>WDV341 Intro PHP</h1>
    <h2>SELECT Example</h2>
    <?php
    require 'dbConnect.php';     

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT name, description, presenter FROM wdv341_events WHERE presenter = :presenterName";  

    $stmt = $conn->prepare($sql); 

    $recordId = 3;
    $presenter = "Carin Murphy";
    $stmt->bindParam(':presenterName', $presenter);

    $stmt->execute();

    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    if($stmt->rowCount() == 0){
        echo "<p>No events with presenter " . $presenter . ", or presenter name is spelled wrong.</p>";
    }else{
        echo "<table>";
        while($row = $stmt->fetch() ){
            echo "<tr>";
            echo "<td> " . $row["name"] . "</td> " ;
            echo "<td> " . $row['description'] . "</td> " ;
            echo "<td> " . $row['presenter'] . "</td> " ;
            echo "</tr>";
        }
        echo "</table>";
    }   
?>
</body>
</html>