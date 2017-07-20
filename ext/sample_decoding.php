<?php
$file = file_get_contents(__DIR__.'/sample_response_daily (copy).json');
$jsonDecoded = json_decode($file);
    //essa sintaxe devolve só o que está em Time Series (Daily)
$symbol = $jsonDecoded->{'Meta Data'}->{'2. Symbol'};
$query = '';
$jsonDecoded = $jsonDecoded->{'Time Series (Daily)'};
    // print_r($jsonDecoded);
    /*
    foreach, key pega a data "indice"
    value é cada um dos arrays de cada data
    key1 é cada um dos indices
    value1 é o valor de cada um dos indices
    com count e if eu pego sempre o primeiro de cada dia
    */
    // $count = 0;
    foreach ($jsonDecoded as $key=>$value) {
        // if ($count < 1) {
            //descomentar para imprimir cada valor
            // foreach ($value as $key1 => $value1) {
              // $query .= "Symbol: $symbol Date: $key Info:$key1 = $value1\n";
        $queryDate = $key;
        $querySymbol = $symbol;
        $queryOpen = $jsonDecoded->{$key}->{'1. open'};
        $queryHigh = $jsonDecoded->{$key}->{'2. high'};
        $queryLow  = $jsonDecoded->{$key}->{'3. low'};
        $queryClose = $jsonDecoded->{$key}->{'4. close'};
        $queryVolume = $jsonDecoded->{$key}->{'5. volume'};
        $query .= "INSERT INTO daily_prices (date,symbol,open,high,low,close,volume) VALUES ($queryDate,$querySymbol,$queryOpen,$queryHigh,$queryLow,$queryClose,$queryVolume);\n";
          // }
          // $count++;
          // echo $count."\n";
                //descomentar para imprimir cada valor
      // }
    }
    print($query);
  // $json1 = json_encode($jsonDecoded);
  //encode as array
  // $jsonSingle = json_decode($json1,true);
  // print_r($jsonSingle);

