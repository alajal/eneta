<?php
include_once (__DIR__."/functions.php");

if (isUserLoggedIn()) {
    $email = getLoggedInUserEmail();
    $first_name = $_POST['update-user-first-name'];
    $last_name = $_POST['update-user-last-name'];
    updateUser($email, $first_name, $last_name, null);
}


header('Location: ../../index.php');