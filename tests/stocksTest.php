<?php
require '../controller/stocks.php';
require '../controller/db_connection.php';
$stocks = new stocks;
$db_connection = new db_connection;
$file = $stocks->getIndexes('KROT3.SA','full');
// print("FETCH AND DECODE ALL INDEXES\n");
$query = $stocks->decodeAllIndexes($file);
// print_r($query);
// print("FETCH SINGLE INDEX\n");
// $query = $stocks->decodeSingleIndex($file); 
// $conn = $db_connection->connect();
// $query = 'SELECT * FROM daily_prices;';
// $res = mysqli_query($conn,$query) or trigger_error('error: '.mysqli_error($conn), E_USER_ERROR);
// print_r($res);
$date = date('Y-m-d H:i:s');
$filename = "log_$date";
$log = fopen(__DIR__."/$filename.txt",'w');
fwrite($log, $query);
fclose($log);
