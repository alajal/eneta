<?php
require_once 'functions.php';
try{
    $messages = getMessages();
} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}

include('templates/index_template.php')
?>

<!--
// /etc/init.d/apache2 start
// /etc/apache2 on konf ls-l-->
