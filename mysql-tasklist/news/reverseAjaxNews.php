<?php
// saame browserilt ajax p2ringu (post) koos timestamp'ga
// hyppame tsyklisse ning iga 5 sekundi tagant kysime baasist, kas on m5ni uudis, mille datetime > timestamp
// kui on, siis kirjutame tulemi $messages ning includime news_show_template.php ning l5petame

require(__DIR__."/functions.php");
// browserilt tuli POST, kus timestamp seatud
if( isset( $_GET['timestamp'] ) ) {

    $timestamp = $_GET['timestamp'];
    $news_ajax_timeout = 15;
    $news_ajax_sec_between_queries = 3;
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

            $data = getNewsHtml($messages);

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