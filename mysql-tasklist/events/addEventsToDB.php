<?php

include (__DIR__."/../news/functions.php");
include_once ("../../session.php");

$events_author = $_POST['edit-events-user'];
$events_title = $_POST['edit-events-title'];
$events_content = $_POST['edit-events-content'];
$events_location = $_POST['edit-events-location'];
date_default_timezone_set("Europe/Tallinn");
$events_date = date("Y-m-d H:i:s");
if(isUserLoggedIn()){   //kontroll - ainult sisselogitud kasutaja saab uudiseid lisada
    addEvents($events_author, $events_title, $events_content, $events_location, $events_date);
}

header('Location: ../../yritused.php');