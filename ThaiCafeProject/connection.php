<?php
	// opens connection to mysql server
	// every time you call this var, it will connect to the db
	$hostname = 'cs-database:3306';
	$username = 'hputiprawan';
	$pwd = '1687904';
	$dbname = 'hputiprawan';
	
	@$dbc = mysql_connect($hostname, $username, $pwd);
	if(!$dbc){
		die('Not connected: ' . mysql_error());
	}

	// select db: mysql_select_db("db name", "variable to connect");
	$db_selected = mysql_select_db($dbname, $dbc);
	if(!$db_selected){
		die("Cannot connected: " . mysql_error());
	}

	echo "Database is connected successfully!";
?>
