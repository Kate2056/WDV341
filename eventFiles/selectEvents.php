

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

        .name{
            background-color:#e3dfde;
            font-weight:bold;
        }
        
    </style>
</head>
<body>
    <h1>WDV341 Intro Php</h1>
    <h2>Select Example</h2>
    <?php
    try{
        require 'dbConnect.php';
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT name, description FROM wdv341_events";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
    }catch (PDOException $e){
        echo "\n Issues with SQL, error message: " . $e->getMessage();
    }
    
    try{
        echo "<table>";
        while($row = $stmt->fetch()){
            echo "<tr>";
            echo "<td class='name'>" . $row["name"] . ": </td><td>"  . $row["description"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    }catch(Exception $e){
        echo "\n Issues with data in table, error message: " . $e->getMessage();
    }
    
?>
</body>
</html>