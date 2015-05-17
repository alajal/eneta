<?php
include_once ("../mysql-tasklist/news/functions.php");
if(isAdmin()) {
    $user_name = getLoggedInUserEmail();
echo "
<form action='mysql-tasklist/news/addNewsToDB.php' method='post' id='edit-news-form-id'>
    <p>
        <label for='edit-news-user-id'>Autori email: </label>
        <input type='text' name='edit-news-user' id='edit-news-user-id' readonly value='$user_name' >

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