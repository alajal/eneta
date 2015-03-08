<?php

include_once '/mysql-tasklist/news/functions.php';

$news_user = "unknown";
$news_title = $_POST['input-news-title'];
$news_content = $_POST['input-news-content'];
$news_date = date("Y-m-d H:i:s");
addNews($news_user, $news_title, $news_content, $news_date);

header('Location: /index.php');
?>