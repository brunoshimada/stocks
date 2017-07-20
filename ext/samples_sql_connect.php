<?php
$mysql_conn = mysqli_connect('localhost','root','sinergisshimada','stocks');
if (!$mysql_conn) {
	print_r("error ".mysqli_connect_error()).PHP_EOL;
} else {
	print_r($mysql_conn->host_info."\n");
}
mysqli_close($mysql_conn);
