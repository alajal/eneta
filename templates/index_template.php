<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Eneta</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css"/>
    <script src="js/jquery-2.1.3.js"></script>
    <script src="js/main.js"></script>
</head>
<body>

<?php
include('header_template.php')
?>

<div id="content">
    <div id="left-sidebar">
        <ul>
            <li><a href="#" id="show-news">Kuva uudised</a> </li>
            <li><a href="#" id="show-news-input">Sisesta uudised</a> </li>
        </ul>
    </div>

    <div id="content-col-1" class="content-col">
        <!--koht, kus javascript loob uued uudised-->
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

    <div id="content-col-2" class="not content-col">
        <p>Siia tuleks the sisestamine</p>
    </div>
</div>

<?php
include('footer_template.php')
?>

</body>
</html>

<!--
// /etc/init.d/apache2 start
// /etc/apache2 on konf ls-l-->