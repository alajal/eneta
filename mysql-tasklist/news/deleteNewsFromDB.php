<?php

include_once (__DIR__."/functions.php");

$id = $_GET['id'];

deleteNews($id);

header('Location: ../../index.php');
?>