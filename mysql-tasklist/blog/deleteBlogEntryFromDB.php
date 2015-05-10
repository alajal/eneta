<?php

include (__DIR__."/../news/functions.php");

$blog_entry_id = $_GET["id"];
$blog_user = getBlogEntryUserById($blog_entry_id);

if (isUserLoggedIn() && ($blog_user == getLoggedInUserEmail())) {
    deleteBlogEntry($blog_entry_id);
}

header('Location: ../../blogi.php');
?>