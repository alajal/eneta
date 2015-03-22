<?php
$access_token = file_get_contents('php://input');
$url = "https://www.googleapis.com/oauth2/v1/tokeninfo?access_token=".$access_token;

$andmed = file_get_contents($url);
$obj = json_decode($andmed);
$email = $obj->{"email"};
echo $email;

