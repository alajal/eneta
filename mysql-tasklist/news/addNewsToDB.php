<?php

include_once (__DIR__."/functions.php");
include_once ("../../session.php");

$news_user = $_POST['edit-news-user'];
$news_title = $_POST['edit-news-title'];
$news_content = $_POST['edit-news-content'];
date_default_timezone_set("Europe/Tallinn");
$news_date = date("Y-m-d H:i:s");
if(isAdmin()){   //kontroll - ainult sisselogitud kasutaja saab uudiseid lisada
    addNews($news_user, $news_title, $news_content, $news_date);
}

header('Location: ../../index.php');
?>