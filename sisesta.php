<?php

require_once 'functions.php';

$textHasValue = false;
$sqlDatabaseConnected = false;

if(isset($_POST['submit'])){

    $news = $_POST['text'];

    $conn = connectToDatabase();
    $sqlDatabaseConnected = true;

    $stmt = $conn->prepare("INSERT INTO news (content) VALUES (:content)");
    $stmt->bindParam(':content', $news);
    $stmt->execute();
    $textHasValue = true;


}

include('templates/sisesta_template.php');

?>

