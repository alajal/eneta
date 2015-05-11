<?php
include '../mysql-tasklist/news/functions.php';

if(isUserLoggedIn()) {
    //kontrollida, kas sellise mailiga kasutaja on olemas, kui jah, edasi lubada, kui ei, siis oelda, et pole oigusi.
    if(loggedInUserInDB(getLoggedInUserEmail())){

            echo "
        <form action='mysql-tasklist/events/addEventsToDB.php' method='post' id='edit-events-form-id'>
            <p>
                <label for='edit-events-author-id'>Ürituse sisestaja: </label>
                <select name='edit-events-author' id='edit-events-author-id'>";

            $users = getUsers();
            //nyyd kuvatakse sisestaja email ainult, muid valikuid pole
            if(count($users) > 0) {
                $u = getLoggedInUserEmail();
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

            <input type='submit' name='edit-submit-events''>

        </form>";
    } else {
        echo "<h3> Ürituste lisamiseks pole õigusi!</h3>";
    }

} else {
    echo "<h3>Ürituste lisamiseks peate sisse logima!</h3>";
}