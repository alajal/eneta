
<!-- uudiste kuvamine -->
<?php
if(count($messages) > 0) {
    foreach($messages as $message) {
        echo "<div class='news-story'>";
        echo "<h3>".$message["title"]."</h3>";
        echo "<p class='news-author'>Autor: ".$message["firstname"]." ".$message["lastname"]."</p>";
        echo "<p>".$message["content"]."</p>";
        echo "<a class='news-mod-link' href='mysql-tasklist/news/deleteNewsFromDB.php?id=".$message["id"]."'>Kustuta</a>";
        echo "<span class='news-mod-link'> | </span>";
        echo "<a class='news-mod-link' href='#".$message["id"]."'>Muuda</a>";
        echo "</div>";
    }
} else {
    echo "<p>mingi jama</p>";
}
?>