<?php

include_once (__DIR__."/../mysql-tasklist/news/functions.php");

// v22rtus tulevad uudiselt GETg'a
$update_news_id = $_GET["id"];

// otseselt tegelt pole vaja baasist uuesti kysida..aga 2kki parem?
// vaja ainult yhte rida/kirjet..ei oska paremini
$update_news_rows = getUsersAndNewsById($update_news_id);
foreach($update_news_rows as $update_news) {
    $update_news_user = $update_news["mail"];
    $update_news_title = $update_news["title"];
    $update_news_content = $update_news["content"];
    break;
}

$users = getUsers();

echo "
<form action='../mysql-tasklist/news/updateNewsInDB.php?id=$update_news_id' method='post'>
    <p>
        <span>Vali autor: </span>
        <select name='input-news-user'>
";
            if(count($users) > 0) {
                foreach($users as $user) {
                    if ($user["mail"] == $update_news_user) {
                        echo "<option value='{$user["mail"]}' selected>{$user["firstname"]} {$user["lastname"]}</option>";
                    } else {
                        echo "<option value='{$user["mail"]}'>{$user["firstname"]} {$user["lastname"]}</option>";
                    }
                }
            } else {
                echo "<p>mingi jama</p>";
            }
echo "
        </select>
    </p>
    <p>Pealkiri</p>
    <textarea name='input-news-title' maxlength='255' rows='1' cols='50'>$update_news_title</textarea>
    <p>Sisu</p>
    <textarea name='input-news-content' rows='10' cols='50'>$update_news_content</textarea>
    <br>
    <input type='submit' name='update-news'>
    <br>

</form>
";