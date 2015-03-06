<?php
require_once 'config.php';

function getMessages()
{
    $conn = connectToDatabase();

    $sql_select = "SELECT t.message FROM test t where t.name = 'Lembit'";
    $stmt = $conn->query($sql_select);
    return $stmt->fetchAll();
}

function connectToDatabase()
{
    global $config_db_host;
    global $config_db_name;
    global $config_db_user;
    global $config_db_pwd;

    $conn = new PDO("mysql:host=$config_db_host;dbname=$config_db_name", $config_db_user, $config_db_pwd);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $conn;
}