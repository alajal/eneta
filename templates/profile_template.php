<?php
if(isUserLoggedIn()) {
    $username = getLoggedInUserEmail();
    $display_name = getUsersByUsername($username);
    $display_name = $display_name["firstname"]." ".$display_name["lastname"];
    $google_full_name = getLoggedInUserFullName();
    echo "
    <h3 id='profile-display-message'>Profiil</h3>
    <span id='profile-user-name' class='not'>$username</span>
    <p>Kasutajanimi: $username<br>Nimi: <span id='profile-display-name'>$display_name</span>
    <button id='profile-edit-name-enable'>Muuda nimi</button>
    </p>
    <form action='mysql-tasklist/news/updateUserInDB.php' method='post' id='update-user-form-id' class='not'>
        <label for='update-user-first-name-id'>Eesnimi: </label>
        <input type='text' name='update-user-first-name' id='update-user-first-name-id' maxlength='45'>
        <label for='update-user-last-name-id'>Perenimi: </label>
        <input type='text' name='update-user-last-name' id='update-user-last-name-id' maxlength='45'>

        <input type='submit' name='update-user-submit'>
        <br>
    </form>
    ";
    include("blog_edit_template.php");
} else {
    echo "<h3 id='profile-display-message'>Profiili vaatamiseks pead olema sisse logitud!</h3>";
    echo "<span id='profile-user-name' class='not'>none</span>";
}
?>



