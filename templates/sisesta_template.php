
<form action="mysql-tasklist/news/addNewsToDB.php" method="post">
    <p>
        <span>Vali autor: </span>
        <select name="input-news-user" title="blablaa">
            <?php
            if(count($users) > 0) {
                foreach($users as $user) {
                    echo "<option value='".$user["mail"]."'>".$user["firstname"]." ".$user["lastname"]."</option>";
                }
            } else {
                echo "<p>mingi jama</p>";
            }
            ?>
        </select>
    </p>
    <p>Pealkiri</p>
    <label>
        <textarea name="input-news-title" maxlength="255" rows="1" cols="50"></textarea>
    </label>

    <p>Sisu</p>
    <label>
        <textarea name="input-news-content" rows="10" cols="50"></textarea>
    </label>
    <br>
    <input type="submit" name="submit-news">
    <br>

</form>

