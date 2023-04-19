<?php
    session_start();

    if( isset($_SESSION['validuser']) ){
        
    }
    else{
        header('Location: login.php');  
    }
   
    require 'dbConnect.php'; 

    $sql = "SELECT id, name, description FROM wdv341_events"; 
    $stmt = $conn->prepare($sql);  
    $stmt->execute();  
    $stmt->setFetchMode(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href="stylesheets/styles.scss">
    <link rel='stylesheet' href="stylesheets/styles.css">
    <title>View Events</title>

</head>
<body>
    <h1>Event System</h1>
    <h2>List of Events</h2>
    <h3>You are signed in as: <?php echo $_SESSION['username']; ?></h3>
    <ul>
        <li><a href="login.php">Admin Home</a></li>
        <li><a href="eventNew.php">Add New Event</a></li>
        <li><a href="eventList.php">View Events</a></li>
        <li><a href="logout.php">Sign off</a></li>
    </ul>
    <div class="displayEvents">
        <table>
            
        <?php
            while($row = $stmt->fetch() ){
                echo "<tr>";
                echo "<td>" . $row["name"] . "</td>";
                echo "<td>" . $row['description'] . "</td>";
                echo "<td><a href='eventDelete.php?eventID=" . $row['id'] . "'><button>Delete</button></a> </td>";
                echo "<td> <a href='eventUpdate.php?eventID=" . $row['id'] . "'><button>Update</button> </a></td>";
                echo "</tr>";  
            }
        ?>
        </table>
    </div>
        <a href="eventNew.php"><button>New Event</button></a>
</body>
</html>