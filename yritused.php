<?php

date_default_timezone_set("Europe/Tallinn");

require_once 'mysql-tasklist/news/functions.php';

$nbr_of_events_per_page = 6;    //hetkel seda v22rtust ei kasutata funktsioonis
$nbr_of_pages = ceil(getTotalNbrOfEvents() / $nbr_of_events_per_page);
$usersAndEvents = getUsersAndEvents(0, $nbr_of_events_per_page);    //parameetrid on hetkel m6ttetud

$users = getUsers();

$loggedin = isUserLoggedIn();

$loggedInUserEmail = 0;
if($loggedin){
    $loggedInUserEmail = getLoggedInUserEmail();
}
$allEvents = getEvents();
$allEventsAvailableForRegister = getEventsAvailableForRegister();
$userRegisteredEvents = userRegisteredEvent($loggedInUserEmail);
$userInDB = loggedInUserInDB($loggedInUserEmail);


include('templates/yritused_template.php');


