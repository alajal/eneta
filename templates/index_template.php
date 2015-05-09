<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="google-signin-clientid" content="236342773769-k9q08n7gkh1lpse03vorof5mp2r2t4k6.apps.googleusercontent.com" />
    <meta name="google-signin-scope" content="email profile" />
    <meta name="google-signin-cookiepolicy" content="single_host_origin" />
    <title>Eneta</title>
    <!--link rel="stylesheet" href="css/bootstrap.css"-->
    <link rel="stylesheet" href="css/style.css"/>
    <script src="js/jquery-2.1.3.js"></script>
    <script src="https://apis.google.com/js/client:platform.js?onload=render" async defer></script>
    <script src="js/main.js" ></script>
    <script src="js/uudised.js"></script>
</head>
<body>
<?php
include('header_template.php');
?>
<div id="content">

        <div id="left-sidebar">
            <ul>
                <li><a href="#uudised" id="show-news">Kuva uudised</a></li>
                <li><a href="#statistika" id="show-news-statistics">Uudiste statistika</a> </li>
                <?php if($loggedin) { ?>
                        <li><a href="#sisestauudis" id="show-news-input" >Sisesta uudised</a> </li>
                        <li><a href="#profiil" id="show-profile" >Profiil</a></li>
                <?php } ?>
            </ul>
        </div>
    <div id="content-col-seenews" class="content-col">
        <!-- uudiste kuvamine -->
        <?php
            include('news_show_template.php');
        ?>
        <button id="load_more_news_button">Lae veel uudiseid</button>
    </div>
    <div id="content-col-insert" class="not content-col">
        <!-- uudiste sisestamine -->
        <?php
            //include('news_edit_template.php');
            //include('../accessToken.php');
        ?>
    </div>
    <div id="content-col-statistics" class="not content-col">
        <!-- statistika kuvamine -->
        <?php
        include('news_statistics_template.php');
        ?>
    </div>
    <div id="content-col-profile" class="not content-col">
        <?php
        include('profile_template.php');
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