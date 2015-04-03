<?php
if (isset ($_GET["cid"])) {
    $filepath = $_GET["cid"];
    echo file_get_contents("pages".$filepath.".html");
}