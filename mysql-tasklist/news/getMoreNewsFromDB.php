<?php
require(__DIR__."/functions.php");
// browserilt tuli POST, kus current_page_nbr seatud
if( isset( $_GET['current_page_nbr'] ) ) {

    $nbr_of_news_per_page = 6;
    $current_page = intval($_GET['current_page_nbr']);
    $start = $current_page * $nbr_of_news_per_page;
    $messages = getUsersAndNews($start, $nbr_of_news_per_page);
    include(__DIR__ . "/../../templates/news_show_template.php");
}