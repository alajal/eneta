<!--https://github.com/Azure/azure-sdk-for-php-samples/tree/master/tasklist-mysql -->
<?php

include_once (__DIR__."/../../config.php");

function connectToDatabase()
{
    // DB connection info
    global $config_db_host;
    global $config_db_name;
    global $config_db_user;
    global $config_db_pwd;
    try{
        $conn = new PDO("mysql:host=$config_db_host;dbname=$config_db_name", $config_db_user, $config_db_pwd, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(Exception $e){
        die(print_r($e));
    }
    return $conn;
}
/*
function markItemComplete($item_id)
{
    $conn = connect();
    $sql = "UPDATE items SET is_complete = 1 WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(1, $item_id);
    $stmt->execute();
}
*/

function getNews()
{
    $conn = connectToDatabase();
    $sql = "SELECT * FROM news ORDER BY datetime DESC";
    $stmt = $conn->query($sql);
    return $stmt->fetchAll();
}

function addNews($user, $title, $content, $date)
{
    $conn = connectToDatabase();
    $sql = "INSERT INTO news (user, title, content, datetime) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(1, $user);
    $stmt->bindValue(2, $title);
    $stmt->bindValue(3, $content);
    $stmt->bindValue(4, $date);
    $stmt->execute();
}

function deleteNews($news_id)
{
    $conn = connectToDatabase();
    $sql = "DELETE FROM news WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(1, $news_id);
    $stmt->execute();
}

function getUsersAndNews()
{
    $conn = connectToDatabase();
    $stmt = $conn->query("select users.mail, users.firstname, users.lastname, news.title, news.content from news inner join users on news.user = users.mail order by news.datetime DESC;");
    return $stmt->fetchAll(); //Returns an array containing all of the result set rows
}
$usersAndNews = getUsersAndNews();
?>