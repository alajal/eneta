<?php
// saame browserilt ajax p2ringu (post) koos timestamp'ga
// hyppame tsyklisse ning iga 5 sekundi tagant kysime baasist, kas on m5ni uudis, mille datetime > timestamp
// kui on, siis kirjutame tulemi $messages ning includime sisestatud_template.php ning l5petame

require(__DIR__."/functions.php");
// browserilt tuli POST, kus timestamp seatud
if( isset( $_POST['timestamp'] ) ) {

    $timestamp = $_POST['timestamp'];
    $news_ajax_timeout = 20;
    $news_ajax_sec_between_queries = 4;
    $news_ajax_cycle_counter = 0;

    $data = "";

    while (true) {

        // esmalt kontrollime timeouti..ei arvesta DB p2ringu aega
        if ($news_ajax_cycle_counter * $news_ajax_sec_between_queries > $news_ajax_timeout) {
            // $data = "<p>no news!</p>";
            break;
        }
        $news_ajax_cycle_counter++;


        // p2rime serverilt ning vaatame, kas saime midagi tagasi
        $messages = getUsersAndNewsAfterDate($timestamp);
        //$messages = getUsersAndNews(0, 1);


        if (count($messages) > 0) {
            foreach($messages as $message) {
                $timestamp = $message["datetime"];
                break;
            }


            foreach($messages as $message) {
                $data .= "
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

            break;
        } else {

            sleep($news_ajax_sec_between_queries);
        }
    }

    $result = array(
        "sisu" => $data,
        "timestamp" => $timestamp
    );

    // encode to JSON, render the result (for AJAX)
    $json = json_encode($result);
    echo $json;

}