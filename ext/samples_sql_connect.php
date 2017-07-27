<?php
/*
	stocks = production
	stocks_staging = dev
*/
$mysql_conn = mysqli_connect('localhost','root','sinergisshimada','stocks_staging');
// if (!$mysql_conn) {
// 	print_r("error ".mysqli_connect_error()).PHP_EOL;
// } else {
// 	print_r($mysql_conn->host_info."\n");
// }
// mysqli_close($mysql_conn);

// $query = "SELECT * FROM daily_prices LIMIT 1";
$query = "SELECT count(*) as count
FROM daily_prices
WHERE symbol = 'ITUB4.SA'";
$result = mysqli_query($mysql_conn,$query);

print_r($result);
// while ($row = $result->fetch_assoc()) {
//         printf ("%s (%s)\n", $row["symbol"], $row["open"]);
// }
$row = $result->fetch_assoc();
$c = $row["count"];
printf($c."\n");
$c += 1;
printf($c."\n");
