<h3>Profiil</h3>
<?php $username = getLoggedInUserEmail();
echo "username: $username";
?>

<form action='mysql-tasklist/blog/addBlogToDB.php' method='post' id='add-blog-form-id'>
    <label for='blog-name-id'>Blogi nimi: </label>
    <input type='text' name='blog-name' id='blog-name-id' maxlength='45'>

    <!--
    <br>
    <label for='blog-user-id'>kasutaja: </label>
    <select name='blog-user' id='blog-user-id'>
    -->
        <?php
        /*
        include '../mysql-tasklist/news/functions.php';
        $users = getUsers();
        if(count($users) > 0) {
            foreach($users as $user) {
                echo "<option value='".$user["mail"]."'>".$user["lastname"]."</option>";
            }
        } else {
            echo "<p>mingi jama</p>";
        } */
        ?>

    <!--
    </select>
    -->

    <input type='submit' name='add-blog-submit''>

</form>


