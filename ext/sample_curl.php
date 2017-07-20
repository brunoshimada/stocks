<?php
    //require 'test_decoding.php';
    $curl = curl_init();
    $symbol = "VALE3.SA";
    // $url = "https://www.alphavantage.co/query?function=TIME_SERIES_DAILY&symbol=$symbol&apikey=QD4ZEAN2ZFKEG38R";
    curl_setopt_array($curl, array(
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_URL => "https://www.alphavantage.co/query?function=TIME_SERIES_DAILY&symbol=$symbol&apikey=QD4ZEAN2ZFKEG38R"
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);
    if ($err) {
        print_r("CURL ERROR # $err\n");
    } else {
        print_r($response);
    }
