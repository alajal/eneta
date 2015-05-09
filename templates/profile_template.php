<h3>Profiil</h3>
<?php $username = getLoggedInUserEmail();
echo $username;
?>

<form action='mysql-tasklist/blog/addBlogToDB.php' method='post' id='add-blog-form-id'>
    <label for='blog-name-id'>Blogi nimi: </label>
    <input type='text' name='blog-name' id='blog-name-id' maxlength='45'>

    <input type='submit' name='add-blog-submit''>

    <br>
</form>

<?php
include("blog_edit_template.php");
?>




