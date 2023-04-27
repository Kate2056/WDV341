<?php
    session_start();
    
    if(isset($_SESSION['validuser'])){

    }
    else{
        header("Location: login.php");
    }
    
    require "dbConnect.php";
    $errorMsg = "";
    $formRequested = true;
 
    if(isset($_POST['submit'])){
        $test = $_POST['eventDuration'];
        if(! empty($test)){
            $errorMsg = "Did not continue, information not added to database.";
            
        }
        else{
        $date = date('Y-m-d');
       
        $eventName = $_POST['eventName'];
        $eventPresenter = $_POST['eventPresenter'];
        $eventDescription = $_POST['eventDescription'];
        $eventDate = date('Y-m-d', strtotime($_POST['eventDate']));
        $eventTime = date('H:i:s', strtotime($_POST['eventTime']));
        $dateInserted = $date;

        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = 'INSERT INTO wdv341_events (name, description, presenter, event_date, event_time, date_inserted, date_updated) 
        VALUES (:eventName, :eventDescription, :eventPresenter,  :eventDate, :eventTime, :dateInserted, :dateInserted)';
        
        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':eventName', $eventName);
        $stmt->bindParam(':eventDescription', $eventDescription);
        $stmt->bindParam(':eventPresenter', $eventPresenter);
        $stmt->bindParam(':eventDate', $eventDate);
        $stmt->bindParam(':eventTime', $eventTime);
        $stmt->bindParam(':dateInserted', $dateInserted);

        $stmt->execute();

        $formRequested = false;
    }
}
    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href="stylesheets/styles.scss">
    <link rel='stylesheet' href="stylesheets/styles.css">
    <title>New Event</title>
</head>
<body>
    <h1>WDV341 Intro PHP</h1>
    <h2>Self Posting Event Form</h2>
    <h3>You are signed in as: <?php echo $_SESSION['username']; ?></h3>
    <ul>
        <li><a href="login.php">Admin Home</a></li>
        <li><a href="eventNew.php">Add New Event</a></li>
        <li><a href="eventList.php">View Events</a></li>
        <li><a href="logout.php">Sign off</a></li>
    </ul>
    <?php
        if($formRequested){
            
    ?>
    <span><?php echo $errorMsg; ?></span>
    <form method="post" action="eventNew.php">
    <div>
        <label for="eventName">Event Name: </label>
        <input name="eventName" id="eventName" type="text" value="" />
    </div>
    <div>
        <label for="eventDescription">Event Description: </label>
        <input name="eventDescription" id="eventDescription" type="text" value="" />
    </div>
    <div>
        <label for="eventPresenter">Event Presenter: </label>
        <input name="eventPresenter" id="eventPresenter" type="text" value="" />
    </div>
    <div>
        <label for="eventDate">Event Date: </label>
        <input name="eventDate" id="eventDate" type="date" value="" />
    </div>
    <div>
        <label for="eventTime">Event Time: </label>
        <input name="eventTime" id="eventTime" type="time" value="" />
    </div>
    <div>
        <input name="eventDuration" id="eventDuration" value="" type="text"/>
    </div>
    <div>
        <input type="submit"  name="submit" id="submit" value="Submit" />
        <input type="reset"  id="reset" value="Reset" />
    </div>
    </form>
    <?php
        }
        else{
          
            header("Location: eventList.php");
        }
        ?>
</body>
</html>