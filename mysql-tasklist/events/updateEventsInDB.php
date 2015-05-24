<?php

include (__DIR__."/../news/functions.php");

$id = $_GET['id'];

$events_author = $_POST['edit-events-author'];
$events_title = $_POST['edit-events-title'];
$events_content = $_POST['edit-events-content'];
$events_actual_date = $_POST['edit-events-eventTime'];
//$events_location = $_POST['edit-events-location'];
date_default_timezone_set("Europe/Tallinn");
$events_date = date("Y-m-d H:i:s");
updateEvents($id, $events_author, $events_title, $events_content, $events_date, $events_actual_date);

header('Location: ../../yritused.php');
?>