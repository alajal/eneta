<?php

function isUserLoggedIn(){
    session_start();
    return isset($_SESSION['googleuserid']);
}

