<h3>Profiil</h3>
<?php $username = getLoggedInUserEmail();
echo "username: $username";
echo $username;
$bla = $_SESSION['googleuserid'];
echo $bla;
?>

<form action='/mysql-tasklist/blog/addBlogToDB.php' method='post' id='edit-news-form-id'>
    <label for='blogname-input'>Blogi nimi: </label>
    <input type='text' name='blogname' id='blogname-input' maxlength='45'>

    <input type='submit' name='edit-submit-news''>

</form>


