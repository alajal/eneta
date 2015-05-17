<?php

if (isAdmin()) {
    $users = getUsers();

    echo "
<p>------------------</p>
<table>
    <thead>
        <tr>
            <th>Kasutajanimi</th>
            <th>Eesnimi</th>
            <th>Perenimi</th>
            <th>Roll</th>
        </tr>
    </thead>
    <tbody>";
        foreach ($users as $user) {
            echo "
            <tr>
                <td class='username'>{$user["mail"]}</td>
                <td class='user_first_name'>{$user["firstname"]}</td>
                <td class='user_last_name'>{$user["lastname"]}</td>
                <td class='user_role'>{$user["role"]}</td>
                <td><button type='button' class='update_user_btn'>Muuda</button></td>
            </tr>
            ";
        }

echo "
    </tbody>
</table>

<form action='mysql-tasklist/news/updateUserAdmin.php' method='post' id='update-user-admin-form-id' class='not'>
    <input type='text' name='update-user-admin-user-name' id='update-user-admin-user-name-id' size='45'>
    <input type='text' name='update-user-admin-first-name' id='update-user-admin-first-name-id' maxlength='45'>
    <input type='text' name='update-user-admin-last-name' id='update-user-admin-last-name-id' maxlength='45'>

    <select name='update-user-admin-role' id='update-user-admin-role-id'>
        <option value='regular'>regular</option>
        <option value='admin'>admin</option>
    </select>

    <input type='submit' name='update-user-admin-submit'>
    <br>
</form>


";
}