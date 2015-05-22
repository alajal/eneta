<?php

require_once (__DIR__."/../news/functions.php");

$participant = getLoggedInUserEmail();
$event_title= $_POST['event-entry-name'];

if(isUserLoggedIn()){   //kontroll - ainult sisselogitud kasutaja saab yritusele registreeruda
    registrationToEvent($participant, $event_title);
}

header('Location: ../../yritused.php');