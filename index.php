<?php
require_once 'mysql-tasklist/news/functions.php';
$messages = getUsersAndNews();
$users = getUsers();

include('templates/index_template.php');
?>

<!--
// /etc/init.d/apache2 start
// /etc/apache2 on konf ls-l-->
