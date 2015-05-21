<?php
if(count($usersAndEvents) > 0) {
    echo getEventsToShow($usersAndEvents);
} else {
    echo "<p>Sündmusi pole!</p>";
}
