<?php
//kui midagion katki, siis dekommenteerid yrituse.js failis ning includei siin functions.php

//include '../mysql-tasklist/news/functions.php';
if($loggedin) {
    if($userInDB){

        echo "
        <form action='mysql-tasklist/events/addEventsToDB.php' method='post' id='edit-events-form-id'>
            <p>
                <label for='edit-events-author-id'>Ürituse sisestaja: </label>
                <select name='edit-events-author' id='edit-events-author-id'>";

                if(count($users) > 0) {
                    $u = $loggedInUserEmail;
                    echo "<option value='".$u."'>".$u."</option>";
                } else {
                    echo "<p>Jama kasutajate saamisel.</p>";
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

            <input type='submit' name='edit-submit-events'>

        </form>";
    } else {
        echo "<h3> Ürituste lisamiseks pole õigusi!</h3>";
    }

} else {
    echo "<h3>Ürituste lisamiseks peate sisse logima!</h3>";
}