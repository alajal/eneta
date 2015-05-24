<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="google-signin-clientid" content="236342773769-k9q08n7gkh1lpse03vorof5mp2r2t4k6.apps.googleusercontent.com" />
    <meta name="google-signin-scope" content="profile" />
    <meta name="google-signin-cookiepolicy" content="single_host_origin" />
    <title>Eneta</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/style.css"/>

    <link rel="stylesheet" href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

    <script src="js/jquery-2.1.3.js"></script>
    <script src="https://apis.google.com/js/client:platform.js?onload=render" async defer></script>
    <script src="js/main.js"></script>
    <script src="js/yritused.js"></script>

    <!--script src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script-->
    <link rel="stylesheet" type="text/css" href="css/jquery.datetimepicker.css"/>
    <script src="js/jquery.datetimepicker.js"></script>

</head>
<body>

<?php
include('header_template.php')
?>

<div id="content">

    <div id="left-sidebar">
        <ul>
            <li><a id="show-events" href="#yritused">Vaata üritusi</a></li>
            <?php if($loggedin) { ?>
                <li><a id="show-events-input" href="#sisestayritus">Sisesta üritusi</a></li>
                <li><a id="register-events-input" href="#registreeriyritusele">Registreerimine</a></li>
            <?php } ?>
            <li><a id="show-events-input" href="#sisestayritus">Sisesta üritusi</a></li>
        </ul>
    </div>

    <div id="content-col-yritused" class="content-col">
        <!--Yrituste kuvamine -->
        <?php
            include('events_show_template.php');
        ?>
    </div>

    <div id="sisesta-yritusi" class="not content-col">
        <!--Yrituste sisestamine -->
        <?php
            include('events_edit_template.php');
        ?>
    </div>

    <div id="registreeri-yritusele" class="not content-col">
        <!--Yritustele registreerimine -->
        <?php
            include('events_register_template.php');
        ?>
    </div>

</div>

<?php
include('footer_template.html')
?>

</body>
</html>
