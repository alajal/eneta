<?php
include (__DIR__."/../news/functions.php");
include_once (__DIR__."/../../session.php");

$event_id = $_GET["id"];

if (isUserLoggedIn()) {
    deleteEvents($event_id);
}

header('Location: ../../yritused.php');
?>