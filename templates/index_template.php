<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Eneta</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="js/main.js"></script>
</head>
<body>

<?php
include('header_template.php');
?>

<div id="content">
    <div id="content-container">
        <div id="left-sidebar">
            <ul>
                <li><a href="#">Kuva uudised</a> </li>
                <li><a href="../sisesta.php">Sisesta uudised</a> </li>
            </ul>
        </div>

        <div id="first-content-col">
            <p>Sisu</p>

            <?php
            if(count($messages) > 0) {
                foreach($messages as $message) {
                    echo "<p>".$message["message"]."</p>";
                }
            } else {
                echo "<p>mingi jama</p>";
            }
            ?>
        </div>

    </div>
</div>

<?php
include('footer_template.php');
?>

</body>
</html>

<!--
// /etc/init.d/apache2 start
// /etc/apache2 on konf ls-l-->