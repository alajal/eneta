<?php
include_once ("../session.php");
if(isUserLoggedIn()) {
echo "
<form action='mysql-tasklist/news/addNewsToDB.php' method='post' id='edit-news-form-id'>
    <p>
        <label for='edit-news-user-id'>Autori email: </label>

        <select name='edit-news-user' id='edit-news-user-id'>
";
        include '../mysql-tasklist/news/functions.php';
        $users = getUsers();
        if(count($users) > 0) {
            foreach($users as $user) {
                echo "<option value='".$user["mail"]."'>".$user["lastname"]."</option>";
            }
        } else {
            echo "<p>mingi jama</p>";
        }

echo "
        </select>

    </p>

    <p>
        <label for='edit-news-title-id'>Pealkiri</label>
        <br>
        <textarea name='edit-news-title' id='edit-news-title-id' maxlength='255' rows='1' cols='50'></textarea>
    </p>

    <p>
        <label for='edit-news-content-id'>Sisu</label>
        <br>
        <textarea name='edit-news-content' id='edit-news-content-id' rows='10' cols='50'></textarea>
    </p>

    <br>

    <input type='submit' name='edit-submit-news''>

</form>
";} else {
    echo "<h3>Uudiste lisamiseks peate sisse logima!</h3>";
}