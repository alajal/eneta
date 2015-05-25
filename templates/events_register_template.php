<?php

if($loggedin){
    if(count($allEvents) > 0) {
        echo "
            <label for='my-events-id'>Minu registreeritud üritused: </label>";

            foreach($userRegisteredEvents as $row){
                echo "<p id='userRegEvent'> {$row["event"]}</p>";
            }

        echo "
            <form action='mysql-tasklist/events/addEventRegistrationToDB.php' method='post' id='register-event-form-id'>
                <p>
                    <label for='event-entry-name-id'>Registreeru uuele üritusele: </label>

                    <select name='event-entry-name'>";

                    foreach($allEventsAvailableForRegister as $event) {
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
