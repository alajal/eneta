<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="google-signin-clientid" content="236342773769-k9q08n7gkh1lpse03vorof5mp2r2t4k6.apps.googleusercontent.com" />
    <meta name="google-signin-scope" content="email profile" />
    <meta name="google-signin-cookiepolicy" content="single_host_origin" />
    <title>Eneta</title>
    <!--link rel="stylesheet" href="css/bootstrap.css"-->
    <link rel="stylesheet" href="../css/style.css"/>
    <script src="js/jquery-2.1.3.js"></script>
    <script src="https://apis.google.com/js/client:platform.js?onload=render" async defer></script>
    <script src="js/main.js"></script>
    <script src="js/blogi.js"></script>
</head>
<body>

<?php
include('header_template.php')
?>


<div id="content">
    <div id="left-sidebar">
        <ul>

        <?php
        include "/mysql-tasklist/news/functions.php";
        $blogs = getBlognames();
        foreach ($blogs as $blog) {
            echo "<li><a href='#{$blog["blogname"]}'>{$blog["blogname"]}</a> </li>";
        }
        ?>

        </ul>
    </div>

    <div class="content-col" id="content-col-blogi">

        <p>Sisu</p>

    </div>
</div>

<?php
include('footer_template.html')
?>

</body>
</html>
