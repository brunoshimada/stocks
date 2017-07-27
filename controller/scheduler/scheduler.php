<?php
	/*
	scheduler 
	1 - select * from symbols
	2 - foreach symbol
	3 - count * from daily_prices where name = symbol
	4.1 - se > 1 fetchone
	4.1.1 - insert
	4.2 - se < 1 fetchall
	4.2.1 - insert
	4.2.2 - update symbol first_time = 0
	*/
	require '../db_connection.php';
	require '../stocks.php';
	//debug
	$stocks = new stocks;
	$db_connection = new db_connection;
	//conectando ao banco
	$conn = $db_connection->connect();
	//step 1
	$query1 = "SELECT * FROM symbols";
	$result1 = mysqli_query($conn,$query1);
	//step 2 
	while ($row1 = $result1->fetch_assoc()) {
		$symbol = $row1["symbol"];
		$first_time = $row1["first_time"];
		//step 4.1
		if ($first_time == 0) {
			$file = $stocks->getIndexes($symbol,'compact');
			$query = $stocks->decodeSingleIndex($file);
			//step 4.1.1
			mysqli_query($conn,$query) or trigger_error('error: '.mysqli_error($conn), E_USER_ERROR);
		} else if ($first_time == 1) { //step 4.2
			$file = $stocks->getIndexes($symbol,'full');
			$query = $stocks->decodeAllIndexes($file);
			//step 4.2.1
			mysqli_query($conn,$query) or trigger_error('error: '.mysqli_error($conn), E_USER_ERROR);
		}
	}