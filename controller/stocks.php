<?php
class stocks {
	public function getIndexes ($symbol) {
		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_SSL_VERIFYPEER => false,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_URL => "https://www.alphavantage.co/query?function=TIME_SERIES_DAILY&symbol=$symbol&apikey=QD4ZEAN2ZFKEG38R"
			));
		// print_r(curl_getinfo($curl));
		$response = curl_exec($curl);
		$err = curl_error($curl);
		curl_close($curl);
		if ($err) {
			print_r("CURL ERROR # $err\n");
		} else {
			return $response;
		}
	}

	public function decodeAllIndexes ($file) {
		$jsonDecoded = json_decode($file);
		$symbol = $jsonDecoded->{'Meta Data'}->{'2. Symbol'};
		$query = '';
		$jsonDecoded = $jsonDecoded->{'Time Series (Daily)'};
		// print_r($jsonDecoded);
		foreach ($jsonDecoded as $key=>$value) {
			foreach ($value as $key1 => $value1) {
				$query .= "Symbol: $symbol Date: $key Info:$key1 = $value1\n";
			}
		}
		print($query);
	}

	public function decodeSingleIndex ($file) {
		$jsonDecoded = json_decode($file);
		$symbol = $jsonDecoded->{'Meta Data'}->{'2. Symbol'};
		$query = '';
		$jsonDecoded = $jsonDecoded->{'Time Series (Daily)'};
		$count = 0;
		foreach ($jsonDecoded as $key=>$value) {
			if ($count < 1) {
				foreach ($value as $key1 => $value1) {
					$query .= "Symbol: $symbol Date: $key Info:$key1 = $value1\n";
				}
				$count++;
			}
		}
		print($query);
	}
}