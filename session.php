<?php

function isUserLoggedIn(){
    if(session_status() !== PHP_SESSION_ACTIVE){
        session_start();
    }
    return isset($_SESSION['googleuserid']);
}


function getLoggedInUserEmail(){
    if(session_status() !== PHP_SESSION_ACTIVE){
        session_start();
    }

    return $_SESSION['email'];
}

function getLoggedInUserFullName(){
    if(session_status() !== PHP_SESSION_ACTIVE){
        session_start();
    }

    return $_SESSION['google_full_name'];
}