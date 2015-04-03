<?php
if (isset ($_GET["cid"])) {
    $filepath = $_GET["cid"];

    $start = strpos($filepath, "?") + 1;
    $filepath = substr($filepath, $start);
    echo file_get_contents("pages/grupid/".$filepath.".html");
}