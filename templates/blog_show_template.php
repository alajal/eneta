<?php
include (__DIR__."/../mysql-tasklist/news/functions.php");

$blogname = $_GET["blogname"];

if ($blogname == "") {
    $blogs = getBlognames();
    foreach ($blogs as $blog) {
        $blogname = $blog["blogname"];
        break;
    }
}

$blogentries = getBlogEntriesByName($blogname);

echo "<h3 class='blog-title'>$blogname</h3>";
echo getBlogEntryHtml($blogentries);