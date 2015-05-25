<?php
include_once (__DIR__."/../mysql-tasklist/news/functions.php");

if(isUserLoggedIn()) {
    $event = $_GET["event"];
    $event_users = getUsersByEvent($event);
    echo "<h3 class='blog-title'>$event</h3>";
    echo "<p>";
        foreach ($event_users as $event_user) {
            echo "{$event_user['firstname']} {$event_user['lastname']}<br>";
        }
    echo "</p>";
} else {
    echo "<h3>Üritusele registreeritud kasutajate nägemiseks peab sisse logima.</h3>";
}