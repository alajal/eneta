<?php

require_once (__DIR__."/../news/functions.php");

$participant = getLoggedInUserEmail();
$event_title= $_POST['event-entry-name'];

function registartionControl($participant, $event_title){
    $userRegisteredEvents = userRegisteredEvent($participant);
    $arv = 0;
    foreach($userRegisteredEvents as  $row){
        //echo $row['event'] . ' sündmus ja tiitel ' . $event_title, " \n";
        if($row['event'] == $event_title){
            $arv = $arv + 1;
        }
    }
    if($arv < 1){
        return true;
    } else {
        return false;
    }
}

if(isUserLoggedIn()){   //kontroll - ainult sisselogitud kasutaja saab yritusele registreeruda
    if(registartionControl($participant, $event_title)){
        registrationToEvent($participant, $event_title);
    }
}

header('Location: ../../yritused.php');
