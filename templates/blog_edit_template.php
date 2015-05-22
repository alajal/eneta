<?php
if(isUserLoggedIn()) {
    echo "
<form action='mysql-tasklist/blog/addBlogToDB.php' method='post' id='add-blog-form-id'>
    <label for='blog-name-id'>Blogi nimi: </label>
    <input type='text' name='blog-name' id='blog-name-id' maxlength='45'>

    <input type='submit' name='add-blog-submit'>

    <br>
</form>

<br>
";
    $user = getLoggedInUserEmail();
    $blogs = getBlognamesByUser($user);
    if(count($blogs) > 0) {
        echo "
<form action='mysql-tasklist/blog/addBlogEntryToDB.php' method='post' id='blog-entry-form-id'>
    <p>
    <label for='blog-entry-name-id'>Vali blogi: </label>

    <select name='blog-entry-name' id='blog-entry-name-id'>";

        foreach($blogs as $blog) {
            echo "<option value='{$blog["blogname"]}'>{$blog["blogname"]}</option>";
        }
        echo "
    </select>

    </p>

    <p>
        <label for='blog-entry-content-id'>Postituse text:</label>
        <br>
        <textarea name='blog-entry-content' id='blog-entry-content-id' rows='10' cols='50'></textarea>
    </p>

    <br>

    <input type='submit' name='blog-entry-submit'>

</form>
";
    } else {
        echo "<p>Blogid puuduvad. Lisa esmalt uus blogi.</p>";
    }

    echo "<br>";

    if(count($blogs) > 0) {
        echo "
<form action='mysql-tasklist/blog/deleteBlogFromDB.php' method='post' id='delete-blog-form-id'>
    <p>
    <label for='delete-blog-name-id'>Kustuta blogi: </label>
    <select name='delete-blog-name' id='delete-blog-name-id'>";

        foreach($blogs as $blog) {
            echo "<option value='{$blog["blogname"]}'>{$blog["blogname"]}</option>";
        }
            echo "
    </select>
    </p>

    <input type='submit' name='delete-blog-submit'>

</form>
";
    } else {
        echo "<p>Blogid puuduvad. Lisa esmalt uus blogi.</p>";
    }

}