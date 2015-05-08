<?php

include (__DIR__."/../news/functions.php");

if(isUserLoggedIn()){   //kontroll - ainult sisselogitud kasutaja saab lisada
    $blog_name = $_POST['blog-entry-name'];
    $blog_entry_content = $_POST['blog-entry-content'];
    date_default_timezone_set("Europe/Tallinn");
    $blog_entry_date = date("Y-m-d H:i:s");

    addBlogEntry($blog_name, $blog_entry_content, $blog_entry_date);
}

header('Location: ../../index.php');
?>