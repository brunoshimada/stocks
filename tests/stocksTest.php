<?php
require '../controller/stocks.php';
$stock = new stocks;
$file = $stock->getIndexes('PETR4.SA');
// print("FETCH AND DECODE ALL INDEXES\n");
// $stock->decodeAllIndexes($file);
print("FETCH SINGLE INDEX\n");
$stock->decodeSingleIndex($file);
