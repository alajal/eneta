<?php
include_once (__DIR__."/functions.php");

if (isAdmin()) {
    $email = $_POST['update-user-admin-user-name'];
    $first_name = $_POST['update-user-admin-first-name'];
    $last_name = $_POST['update-user-admin-last-name'];
    $role = $_POST['update-user-admin-role'];
    updateUser($email, $first_name, $last_name, $role);
}


header('Location: ../../index.php#profiil');