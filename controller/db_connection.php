<?php
	class db_connection {
		public function connect () {
			static $conn;
			if (!isset($conn)) {
				$conn = mysqli_connect('localhost','root','sinergisshimada','stocks_staging');
			}
			if ($conn === false)
				return mysqli_connect_error();
			return $conn;
		}
	}