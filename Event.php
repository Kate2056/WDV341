<?php

class Event{

    //properties
    public $eventName;
    public $eventDescription;
    public $eventPresenter;

    //methods
    function __construct(){
        $this->eventName = "";
        $this->eventDescription = "";
        $this->eventPresenter = "";
    }

    function setEventName($eventName){
        $this->eventName = $eventName;
    }

    function setEventDescription($eventDescription){
        $this->eventDescription = $eventDescription;
    }

    function setEventPresenter($eventPresenter){
        $this->eventPresenter = $eventPresenter;
    }

    function getEventName(){
        return $this->eventName;
    }

    function getEventDescription(){
        return $this->getEventDescription;
    }

    function getEventPresenter(){
        return $this->getEventPresenter;
    }
    





}



?>