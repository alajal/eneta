<?php
require(__DIR__."/functions.php");
// browserilt tuli POST, kus current_page_nbr seatud
if( isset( $_POST['current_page_nbr'] ) ) {

    $nbr_of_news_per_page = 8;
    $current_page = intval($_POST['current_page_nbr']);
    $start = $current_page * $nbr_of_news_per_page;
    $messages = getUsersAndNews($start, $nbr_of_news_per_page);
    include(__DIR__."/../../templates/sisestatud_template.php");
}