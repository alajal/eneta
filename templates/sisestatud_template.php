
<!-- uudiste kuvamine -->
<?php
if(count($messages) > 0) {
    foreach($messages as $message) {
        echo "<div class='news-story'>";
        echo "<h3>".$message["title"]."</h3>";
        echo "<p class='news-author'>Autor: ".$message["firstname"]." ".$message["lastname"]."</p>";
        echo "<p>".$message["content"]."</p>";
        echo "</div>";
    }
} else {
    echo "<p>mingi jama</p>";
}
?>