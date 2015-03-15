
<!-- uudiste kuvamine -->
<?php
if(count($messages) > 0) {
    foreach($messages as $message) {
        echo "
        <div class='news-story'>
            <h3>{$message["title"]}</h3>
            <p class='news-author'>Autor: {$message["firstname"]} {$message["lastname"]}</p>
            <p>{$message["content"]}</p>
            <p class='news-mod-link'>
                <a href='mysql-tasklist/news/deleteNewsFromDB.php?id={$message["id"]}'>Kustuta</a>
                <span> | </span>
                <a href='templates/news_edit_template.php?id={$message["id"]}'>Muuda</a>
            </p>
        </div>
        ";
    }
} else {
    echo "<p>mingi jama</p>";
}
?>