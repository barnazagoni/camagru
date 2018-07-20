<?php
	function sql_connect()
	{
		$add = "127.0.0.1";
		$user = "hbstudent";
		$pass = "hbstudent";

		$mysqli = mysqli_connect($add, $user, $pass);
		if (mysqli_connect_errno($mysqli))
		{
			echo "Failed to connect to the database: " . mysqli_connect_error();
			return (NULL);
		}
		return $mysqli;
	}
	function database_connect()
	{
		$add = "127.0.0.1";
		$user = "hbstudent";
		$pass = "hbstudent";
		$dbName = "camagru";

		$mysqli = mysqli_connect($add, $user, $pass, $dbName);
		if (mysqli_connect_errno($mysqli))
		{
			echo "Failed to connect to the database: " . mysqli_connect_error();
			return (NULL);
		}
		return $mysqli;
	}
	?>
