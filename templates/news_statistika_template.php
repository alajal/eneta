<!-- statistika kuvamine -->
<h3>Andmebaasis olevate uudiste arv kasutajate kaupa</h3>
<?php
if(count($news_statistics) > 0) {
    foreach($news_statistics as $row) {
        echo "<p>".$row["firstname"]." ".$row["lastname"].": ".$row["arv"]."</p>";
    }
} else {
    echo "<p>jama 2</p>";
}
?>