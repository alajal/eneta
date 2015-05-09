<?php

include('session.php');
date_default_timezone_set("Europe/Tallinn");

require_once 'mysql-tasklist/news/functions.php';

$nbr_of_events_per_page = 20;
$nbr_of_pages = ceil(getTotalNbrOfEvents() / $nbr_of_events_per_page);
$usersAndEvents = getUsersAndEvents(0, $nbr_of_events_per_page);

$users = getUsers();
//$news_statistics = getNbrOfNewsByUsers(); voibolla yrituste jaoks ka teha

$loggedin = isUserLoggedIn();

$loggedInUserEmail = 0;
if($loggedin){
    $loggedInUserEmail = getLoggedInUserEmail();
}

include('templates/yritused_template.php');


