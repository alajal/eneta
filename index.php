<?php
date_default_timezone_set("Europe/Tallinn");

require_once 'mysql-tasklist/news/functions.php';

$nbr_of_news_per_page = 6;
$nbr_of_pages = ceil(getTotalNbrOfNews() / $nbr_of_news_per_page);
$messages = getUsersAndNews(0, $nbr_of_news_per_page);

$users = getUsers();
$news_statistics = getNbrOfNewsByUsers();

include('templates/index_template.php');
?>

<!--
// /etc/init.d/apache2 start
// /etc/apache2 on konf ls-l-->
