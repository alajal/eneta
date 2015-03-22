<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Eneta</title>
    <!--link rel="stylesheet" href="css/bootstrap.css"-->
    <link rel="stylesheet" href="css/style.css"/>
    <script src="js/jquery-2.1.3.js"></script>
    <script src="js/main.js"></script>
</head>
<body>

<?php
include('header_template.html');
?>

<div id="content">

    <div id="left-sidebar">
        <ul>
            <li><a href="#" id="show-news">Kuva uudised</a> </li>
            <li><a href="#" id="show-news-input">Sisesta uudised</a> </li>
            <li><a href="#" id="show-news-statistics">Uudiste statistika</a> </li>
        </ul>
    </div>


    <div id="content-col-1" class="content-col">

        <!-- uudiste kuvamine -->
        <?php
            include('sisestatud_template.php');
        ?>
        <button id="load_more_news_button">Lae veel uudiseid</button>
    </div>

    <div id="content-col-2" class="not content-col">
        <!-- uudiste sisestamine -->
        <?php
            include('news_edit_template.php');
        ?>
    </div>

    <div id="content-col-3" class="not content-col">
        <!-- statistika kuvamine -->
        <?php
        include('news_statistika_template.php');
        ?>
    </div>

</div>

<?php
include('footer_template.html');
?>

<!-- et saaks JS kasutada, kergem kui ajaxit teha veel -->
<div id="nbr_of_total_news_pages" class="not">
    <?php
    echo htmlspecialchars($nbr_of_pages);
    ?>
</div>

</body>
</html>

<!--
// /etc/init.d/apache2 start
// /etc/apache2 on konf ls-l-->