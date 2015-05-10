<?php

include (__DIR__."/../news/functions.php");

$blogname = $_GET["delete-blog-name"];
$blog_user = getBlogUser($blogname);

if (isUserLoggedIn() && ($blog_user == getLoggedInUserEmail())) {
    deleteBlog($blogname);
}

header('Location: ../../index.php');
?>