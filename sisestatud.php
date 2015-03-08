<?php


function getUsersAndNews()
{
    $conn = connectToDatabase();
    $stmt = $conn->query("select users.mail, news.content from news inner join users on news.user = users.mail;");
    //õigete andmebaasi andmetega tuleb: "anu654@hotmail.com, Kukeseened on kollased."
    return $stmt->fetchAll(); //Returns an array containing all of the result set rows 
}
$usersAndNews = getUsersAndNews();

include('templates/sisestatud_template.php');

?>