<?php

include_once (__DIR__."/functions.php");

$id = $_GET['id'];

if (isAdmin()) {
    $news_user = $_POST['edit-news-user'];
    $news_title = $_POST['edit-news-title'];
    $news_content = $_POST['edit-news-content'];
    date_default_timezone_set("Europe/Tallinn");
    $news_date = date("Y-m-d H:i:s");
    updateNews($id, $news_user, $news_title, $news_content, $news_date);
}

header('Location: ../../index.php');
?>