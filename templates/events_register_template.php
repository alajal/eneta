<?php

if(isUserLoggedIn()){
    $events = getEvents();
    if(count($events) > 0) {
    echo "
        <form action='mysql-tasklist/events/addEventRegistrationToDB.php' method='post' id='register-event-form-id'>
            <p>
                <label for='event-entry-name-id'>Vali üritus: </label>

                <select name='event-entry-name'>";

                foreach($events as $event) {
                    echo "<option value='{$event["title"]}'>{$event["title"]}</option>";
                }
                echo "
                </select>
            </p>

            <br>
            <input type='submit' name='register-submit-events'>

        </form>
    ";
    }

}
else {
    echo "Selle lehe nägemiseks logi sisse!";

}
