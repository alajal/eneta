<?php
require_once '/mysql-tasklist/news/getitems.php';

$messages = getNews();

include('templates/index_template.php');
?>

<!--
// /etc/init.d/apache2 start
// /etc/apache2 on konf ls-l-->
