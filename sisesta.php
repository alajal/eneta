<?php

$config_db_host = "localhost";
$config_db_user = "root";
$config_db_pwd = "mariaandmebaas";
$config_db_name = "enetaDB";

include('templates/sisesta_template.php');

if(isset($_POST['submit'])){
    echo "Vajutati nuppu!",  "\n";
    $news = $_POST['text'];

    try {
        $dbh = new PDO("mysql:host=$config_db_host;dbname=$config_db_name", $config_db_user, $config_db_pwd);
        // set the PDO error mode to exception
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully";

        $stmt = $dbh->prepare("INSERT INTO NEWS (content) VALUES (:content)");
        $stmt->bindParam(':content', $news);
        echo "Jõuti siia.";

    }
    catch(PDOException $e)
    {
        echo "Connection failed: " . $e->getMessage();
    }

}

?>

