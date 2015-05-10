<?php

include (__DIR__."/../news/functions.php");

$blogname = $_POST["delete-blog-name"];
$blog_user = getBlogUser($blogname);

if (isUserLoggedIn() && ($blog_user == getLoggedInUserEmail())) {
    deleteBlog($blogname);
}

header('Location: ../../index.php');
?>