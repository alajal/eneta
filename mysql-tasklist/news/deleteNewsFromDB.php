<?php

include_once (__DIR__."/functions.php");
include_once (__DIR__."/../../session.php");

$id = $_GET["id"];

if (isUserLoggedIn()) {
    deleteNews($id);
}

header('Location: ../../index.php');
?>