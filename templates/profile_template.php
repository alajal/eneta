<?php
if(isUserLoggedIn()) {
    $username = getLoggedInUserEmail();
    $display_name = getUsersByUsername($username);
    $display_name = $display_name["firstname"]." ".$display_name["lastname"];
    echo "
    <h3 id='profile-display-message'>Profiil</h3>
    <span id='profile-user-name' class='not'>$username</span>
    <p>Kasutajanimi: $username<br>Nimi: $display_name
    </p>";

   include("blog_edit_template.php");
} else {
    echo "<h3 id='profile-display-message'>Profiili vaatamiseks pead olema sisse logitud!</h3>";
    echo "<span id='profile-user-name' class='not'>none</span>";
}
?>




