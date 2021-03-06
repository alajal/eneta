<?php
//kõike siin tehakse ainult korra ning peale päringu lõppu, ei tea keegi sellest failist ega selle sees olevatest asjadest midagi
$access_token = file_get_contents('php://input');   //loen kogu POST päringu sisu
$url = "https://www.googleapis.com/oauth2/v1/tokeninfo?access_token=".$access_token;

$andmed = file_get_contents($url);
$obj = json_decode($andmed);
$email = $obj->{"email"};
$googleuserid = $obj->{"user_id"};

$url = "https://www.googleapis.com/oauth2/v1/userinfo?alt=json&access_token=".$access_token;
$andmed = file_get_contents($url);
$obj = json_decode($andmed);

$google_first_name = $obj->{"given_name"};
$google_family_name = $obj->{"family_name"};
$google_full_name = $obj->{"name"};

//kuna kasutaja andmed on saadaval ainult siin ja ainult siis kui tehakse POST päring, siis tuleb session teha ka siin
session_start();

//kui kasutaja on sisse logitud:
//sessionisse salvestan kasutaja emaili jms (või cookisse või andmebaasi on teised võimalusd)
$_SESSION['googleuserid'] = $googleuserid;
$_SESSION['email'] = $email;
$_SESSION['google_first_name'] = $google_first_name;
$_SESSION['google_family_name'] = $google_family_name;
$_SESSION['google_full_name'] = $google_full_name;


include "mysql-tasklist/news/functions.php";
// kui kasutajat pole baasis, lisame
if (!is_null($googleuserid)) {
    if (!loggedInUserInDB($email)) {
        addUser($email, $google_first_name, $google_family_name, "regular");
    }
}



