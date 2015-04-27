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
    <script src="js/jquery-2.1.3.js"></script>
    <script src="https://apis.google.com/js/client:platform.js?onload=render" async defer></script>
    <script src="js/main.js"></script>
    <script src="/js/grupid.js"></script>
</head>
<body>

<?php
include('header_template.php')
?>

<div id="content">
    <div id="left-sidebar">
        <ul>
            <li><a class="grupid-select" href='grupid.php?mct'>MCT</a> </li>
            <li><a class="grupid-select" href='grupid.php?msp'>MSP</a> </li>
            <li><a class="grupid-select" href='grupid.php?mvp'>MVP</a> </li>
        </ul>
    </div>

    <div id="content-col-grupid" class="content-col">
        <h3>Eneta</h3>
        <p>Eneta.ee kommuuniportaal on info- ja suhtluskeskkond Microsofti tehnoloogiakasutajatele Eestis. Eneta eesmärk on koondada tehnoloogialane info, inimesed ja ettevõtted kokku ning pakkuda mugavat platvormi suhtlemiseks ja teadmiste jagamiseks.</p>
    </div>
</div>

<?php
include('footer_template.html')
?>

</body>
</html>
