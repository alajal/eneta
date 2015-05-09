<?php
include_once ("../session.php");
if(isUserLoggedIn()) {
    echo "
<form action='mysql-tasklist/events/addEventsToDB.php' method='post' id='edit-events-form-id'>
    <p>
        <label for='edit-events-user-id'>Autori email: </label>

        <select name='edit-events-user' id='edit-events-user-id'>
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
        <label for='edit-events-title-id'>Ürituse nimi</label>
        <br>
        <textarea name='edit-events-title' id='edit-events-title-id' maxlength='255' rows='1' cols='50'></textarea>
    </p>

    <p>
        <label for='edit-events-content-id'>Ürituse kirjeldus</label>
        <br>
        <textarea name='edit-events-content' id='edit-events-content-id' rows='10' cols='50'></textarea>
    </p>

    <br>

    <input type='submit' name='edit-submit-events''>

</form>
";} else {
    echo "<h3>Ürituste lisamiseks peate sisse logima!</h3>";
}