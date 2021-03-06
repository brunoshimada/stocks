<?php
class stocks
{
    public function getIndexes($symbol,$outputsize)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_URL => "https://www.alphavantage.co/query?function=TIME_SERIES_DAILY_ADJUSTED&symbol=$symbol&outputsize=$outputsize&apikey=QD4ZEAN2ZFKEG38R"
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
        $query = "INSERT INTO daily_prices (date,symbol,open,high,low,close,close_adjusted,volume) VALUES ";
        foreach ($jsonDecoded as $key => $value) {
            $queryDate = $key;
            $querySymbol = $symbol;
            $queryOpen = $jsonDecoded->{$key}->{'1. open'};
            $queryHigh = $jsonDecoded->{$key}->{'2. high'};
            $queryLow  = $jsonDecoded->{$key}->{'3. low'};
            $queryClose = $jsonDecoded->{$key}->{'4. close'};
            $queryAdjustedClose = $jsonDecoded->{$key}->{'5. adjusted close'};
            $queryVolume = $jsonDecoded->{$key}->{'6. volume'};
            // se for usar as de baixo necessários alter table
            // $queryDividendAmount = $jsonDecoded->{$key}->{'7. dividend amount'};
            // $querySplitCoefficient = $jsonDecoded->{$key}->{'8. split coefficient'};
            $query .= "('$queryDate','$querySymbol',$queryOpen,$queryHigh,$queryLow,$queryClose,$queryAdjustedClose,$queryVolume),";
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
                $queryAdjustedClose = $jsonDecoded->{$key}->{'5. adjusted close'};
                $queryVolume = $jsonDecoded->{$key}->{'6. volume'};
            // se for usar as de baixo necessários alter table
            // $queryDividendAmount = $jsonDecoded->{$key}->{'7. dividend amount'};
            // $querySplitCoefficient = $jsonDecoded->{$key}->{'8. split coefficient'};
                $query .= "INSERT INTO daily_prices (date,symbol,open,high,low,close,close_adjusted,volume) VALUES ('$queryDate','$querySymbol',$queryOpen,$queryHigh,$queryLow,$queryClose,$queryAdjustedClose,$queryVolume);\n";
            }
            $count++;
        }
        // print($query);
        return $query;
    }
}
