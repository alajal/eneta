
<?php

if(count($messages) > 0) {
    echo getNewsHtml($messages);
} else {
    echo "<p>mingi jama</p>";
}
?>