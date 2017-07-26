<?php
class stocks
{
    public function getIndexes($symbol)
    {
        $curl = curl_init();
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
            return $response;
        }
    }

    public function decodeAllIndexes($file)
    {
        $jsonDecoded = json_decode($file);
        $symbol = $jsonDecoded->{'Meta Data'}->{'2. Symbol'};
        $query = '';
        $jsonDecoded = $jsonDecoded->{'Time Series (Daily)'};
        $query = "INSERT INTO daily_prices (date,symbol,open,high,low,close,volume) VALUES ";
        foreach ($jsonDecoded as $key => $value) {
            $queryDate = $key;
            $querySymbol = $symbol;
            $queryOpen = $jsonDecoded->{$key}->{'1. open'};
            $queryHigh = $jsonDecoded->{$key}->{'2. high'};
            $queryLow  = $jsonDecoded->{$key}->{'3. low'};
            $queryClose = $jsonDecoded->{$key}->{'4. close'};
            $queryVolume = $jsonDecoded->{$key}->{'5. volume'};
            $query .= "('$queryDate','$querySymbol',$queryOpen,$queryHigh,$queryLow,$queryClose,$queryVolume),";
        }
        $query = substr($query, 0, -1);
        $query .= ";";
        // print($query);
        return $query;
    }

    public function decodeSingleIndex($file)
    {
        $jsonDecoded = json_decode($file);
        $symbol = $jsonDecoded->{'Meta Data'}->{'2. Symbol'};
        $query = '';
        $jsonDecoded = $jsonDecoded->{'Time Series (Daily)'};
        $count = 0;
        foreach ($jsonDecoded as $key => $value) {
            if ($count < 1) {
                $queryDate = $key;
                $querySymbol = $symbol;
                $queryOpen = $jsonDecoded->{$key}->{'1. open'};
                $queryHigh = $jsonDecoded->{$key}->{'2. high'};
                $queryLow  = $jsonDecoded->{$key}->{'3. low'};
                $queryClose = $jsonDecoded->{$key}->{'4. close'};
                $queryVolume = $jsonDecoded->{$key}->{'5. volume'};
                $query .= "INSERT INTO daily_prices (date,symbol,open,high,low,close,volume) VALUES ('$queryDate','$querySymbol',$queryOpen,$queryHigh,$queryLow,$queryClose,$queryVolume);\n";
            }
            $count++;
        }
        // print($query);
        return $query;
    }
}
