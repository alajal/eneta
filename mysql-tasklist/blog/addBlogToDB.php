<?php

include_once (__DIR__."../news/functions.php");
include_once ("../../session.php");

if(isUserLoggedIn()){   //kontroll - ainult sisselogitud kasutaja saab uudiseid lisada
    $blog_user = getLoggedInUserEmail();
    $blog_name = $_POST['blogname'];
    addBlog($blog_user, $blog_name);
}

//header('Location: ../../index.php');
?>