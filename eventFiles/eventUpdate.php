<?php
    session_start();
    if(isset($_SESSION['validuser'])){

    }else{
        header('Location: login.php');
    }

if(isset($_POST['submit'])){
    echo "Success";
    $eventID = $_GET['eventID'];
    $eventName = $_POST['eventName'];
    $eventDescription= $_POST['eventDescription'];
    $eventDate = $_POST['eventDate'];
    $eventTime = $_POST['eventTime'];
    $eventPresenter = $_POST['eventPresenter'];

    require 'dbConnect.php';

    $sql = "UPDATE wdv341_events SET name=:eventName, description=:eventDescription, presenter=:eventPresenter, event_date=:eventDate,
        event_time=:eventTime WHERE id=:eventID";
    
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":eventID", $eventID);
    $stmt->bindParam(":eventName", $eventName);
    $stmt->bindParam(":eventDescription", $eventDescription);
    $stmt->bindParam(":eventPresenter", $eventPresenter);
    $stmt->bindParam(":eventDate", $eventDate);
    $stmt->bindParam(":eventTime", $eventTime);
    $stmt->execute();  

    header('Location: eventList.php');

    
}
else{
    $eventID = $_GET['eventID'];
    require 'dbConnect.php';

    $sql = "SELECT id, name, description, presenter, event_date, event_time FROM wdv341_events WHERE id = :eventID";
    $stmt = $conn->prepare($sql);  
    $stmt->bindParam(":eventID", $eventID);
    $stmt->execute();  
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $row = $stmt->fetch();

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
    <form method="POST" action="eventUpdate.php?eventID= <?php echo $eventID?>">
        <p>
            <label for="eventName">Event Name</label>
            <input type="text" name="eventName" id="eventName" value="<?php echo $row['name']?>">
        </p>
        <p>
            <label for="eventDescription">Event Description</label>
            <input type="text" name="eventDescription" id="eventDescription" value="<?php echo $row['description']?>">
        </p>
        <p>
            <label for="eventPresenter">Event Presenter</label>
            <input type="text" name="eventPresenter" id="eventPresenter" value="<?php echo $row['presenter']?>">
        </p>
        <p>
            <label for="eventDate">Event Date</label>
            <input type="date" name="eventDate" id="eventDate" value="<?php echo $row['event_date']?>">
        </p>
        <p>
            <label for="eventTime">Event Time</label>
            <input type="time" name="eventTime" id="eventTime" value="<?php echo $row['event_time']?>">
        </p>

        <input type='submit' name="submit" value="Submit Changes">
        <input type='submit' value="Reset">
    </form>
</body>
</html>