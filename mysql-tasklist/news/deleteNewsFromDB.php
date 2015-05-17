<?php

include_once (__DIR__."/functions.php");
include_once (__DIR__."/../../session.php");

$id = $_GET["id"];

if (isAdmin()) {
    deleteNews($id);
}

header('Location: ../../index.php');
?>