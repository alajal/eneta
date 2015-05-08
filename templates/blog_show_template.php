<?php
include (__DIR__."/../mysql-tasklist/news/functions.php");

$blogname = $_GET["blogname"];
$blogentries = getBlogEntriesByName($blogname);

echo getBlogEntryHtml($blogentries);