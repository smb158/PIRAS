<?php
	require ("dbinfo.php");
	// open connection
	$mysqli = new mysqli("localhost", $db_user, $db_pass, $db_name);
	if ($mysqli->connect_errno) {
		die("<hr/>Failed to connect to MySQL: " . $mysqli->connect_error);
	} else {
	}
		
	print "Accounts:";

	$query = "SELECT DISTINCT account FROM Transactions";

	/* execute query */
	$result = $mysqli->query($query);

	while($row = $result->fetch_row()) {
		$account = $row[0];
		print "<input type=\"checkbox\" id=\"$account\" checked>$account</input>";
	}
			
	/* close connection */
	$mysqli->close();
	
?>