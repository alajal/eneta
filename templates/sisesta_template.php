<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Eneta</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/style.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="../js/main.js"></script>
</head>
<body>

    <form method="post">
        Lisa uudis:<br>
        <input type="text" name="text">

        <input type="submit" name="submit">
        <br>

    </form>

    <?php
        if($textHasValue) {
            echo "<p>Kõik õnnestus</p>";
        }
        if($sqlDatabaseConnected) {
            echo "<p>Tere</p>";
        }
    ?>



</body>
</html>