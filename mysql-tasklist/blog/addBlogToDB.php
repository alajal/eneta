<?php

include ("../news/functions.php");
//include ("../../session.php");


if(isUserLoggedIn()){   //kontroll - ainult sisselogitud kasutaja saab uudiseid lisada
    $blog_user = getLoggedInUserEmail();
    //$blog_user = $_POST['blog-user'];
    $blog_name = $_POST['blog-name'];
    addBlog($blog_user, $blog_name);
} else {
    $blog_user = "oskar.ohakas@ut.ee";
    //$blog_user = $_POST['blog-user'];
    $blog_name = $_POST['blog-name'];
    addBlog($blog_user, $blog_name);
}

header('Location: ../../index.php');
?>