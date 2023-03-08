<?php


try{
    require 'dbConnect.php';
    require 'Event.php';

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT name, description, presenter FROM wdv341_events WHERE presenter = 'Carin Murphy'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $row = $stmt->fetch();

    $eventObject = new Event();
    $eventObject->eventName = $row['name'];
    $eventObject->eventDescription = $row['description'];
    $eventObject->eventPresenter = $row['presenter'];
    echo "\n" . json_encode($eventObject);

}catch (PDOException $e){
    echo "\n Issues with progam, error message: " . $e->getMessage();;
}

?>