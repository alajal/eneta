<?php
if (isset ($_GET["cid"])) {
    $filepath = $_GET["cid"];

    if ($filepath == "") {
        $filepath = "default";
    }
    
    echo file_get_contents("pages/grupid/" . $filepath . ".html");

}