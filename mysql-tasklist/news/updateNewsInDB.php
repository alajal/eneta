<?php

include_once (__DIR__."/functions.php");

$id = $_GET['id'];

$news_user = $_POST['input-news-user'];
$news_title = $_POST['input-news-title'];
$news_content = $_POST['input-news-content'];
$news_date = date("Y-m-d H:i:s");
updateNews($id, $news_user, $news_title, $news_content, $news_date);

header('Location: ../../index.php');
?>